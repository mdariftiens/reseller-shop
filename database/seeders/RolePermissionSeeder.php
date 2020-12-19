<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     *   get All Route Names as Array
     */
    function getAllRouteNameAsArray()
    {

        static $routeNames = [];

        if (count($routeNames)) {
            return $routeNames;
        }

        $avoidableMiddlewares = ['token.auth', 'CommonAccessMiddleware'];

        foreach (Route::getRoutes() as $key=>$route){
            $as = $route['action']['as']??'';
            if ( $as == "") continue;
            $middlewares = $route['action']['middleware']??'';
            if (is_array($middlewares)) {
                foreach ($middlewares as $key => $value) {
                    if (!in_array($value, $avoidableMiddlewares) && !in_array($as, $routeNames)) {
                        $routeNames[] =  $as;
                    }
                }
            }
        }

        return $routeNames;
    }

    public function generatePermission(): array
    {

        $models = ['User', 'Cat', 'Collection', 'Business Category', 'Bonus Type', 'Bonus', 'Paid Amount', 'Product', 'Order','Shop Setting',  'Note'];

        $permissions = ['list', 'create', 'edit', 'show', 'delete', 'enable'];

        $generatedPermission = [];

        foreach ($models as $model){
            foreach ($permissions as $permission){
                $generatedPermission[] =  ['Can-' . $permission .'-' . $model];
            }
        }
        return $generatedPermission;
    }

    public function generateRouteName(): array
    {
        Artisan::call("route:list");
        $text = Artisan::output();
        $lines = explode( "\r\n",$text);

        /* dump( $text);
         echo "Lines = " .count( $lines);*/
        $routeNameArray = [];

        foreach ($lines as $line) {
            $line = trim( $line );
//            echo $line . "\n";
            if ( Str::contains( $line,"---+----------"))
                continue;

            if ( Str::contains( $line, "| ")){
                $cols = explode("| " ,$line);
                if (trim($cols[6]) == "web        |" && trim($cols[4]) !=''){
                    $routeNameArray[] = trim($cols[4]);
                }
            }
        }
        return  $routeNameArray;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $role = ['admin','manager','delivery-man','customer'];

//        $permissions = $this->generatePermission();
        $permissions = $this->generateRouteName();

        // create permissions               // example      //Permission::create(['name' => 'delete articles']);

        $permissionForPermissionTableAsArray = [];
        foreach ( $permissions as $permission ){
            $permissionForPermissionTableAsArray [] = [
                'name' => $permission,
                'guard_name' => 'web',
            ];
        }
        Permission::insert( $permissionForPermissionTableAsArray );

        // create roles and assign created permissions

        Role::create(['name' => 'admin'])->givePermissionTo( $permissions ); // All permission to Admin

        /*
        $managerRemovePermissions = [
            'Can-List-User',
            'Can-Create-User',
            'Can-Edit-User',
            'Can-Show-User',
            'Can-Delete-User',
            'Can-Enable-User',
            ];
        $managerPermissions = [];
        foreach ( $permissions as $permission){
            if ( in_array($permission, $managerRemovePermissions) )
                continue;
            $managerPermissions[] = ['name'=> $permission];
        }
        Role::create(['name' => 'manager'])->givePermissionTo( $managerPermissions );


        $deliveryManRemovePermissions = [''];
        $deliveryManPermissions = '';
        Role::create(['name' => 'delivery-man'])->givePermissionTo( $deliveryManPermissions );


        $customerRemovePermissions = [''];
        $customerPermissions = '';
        Role::create(['name' => 'customer'])->givePermissionTo( $customerPermissions );

        $customerRemovePermissions = [''];
        $customerPermissions = '';
        Role::create(['name' => 'customer'])->givePermissionTo( $customerPermissions );*/


    }
}
