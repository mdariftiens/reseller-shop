<?php

namespace App\Models;

use App\Abstracts\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cat extends Model
{
    protected $fillable = [
        'name',
        'enabled',
        'description',
        'created_by_user_id',
        'updated_by_user_id'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class );
    }
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public static function getEnabledItemForDropdown(){

        return self::select('id', 'name')
            ->enabled()
            ->orderBy('name')
            ->pluck('name','id')
            ->toArray();
    }

    public static function buildTree(){
        $tree = [];
        $categories = self::with('parent','children')
//            ->orderBy('name')
            ->get();

        foreach ($categories as $category){
           self::build($tree, $category);
        }
        return $tree;
    }

    public static function build(&$tree, $category){
//        dump( $category);
        if ( $category->parent_id == null){
            $tree[$category->name] = [];
            if ($category->children->count() > 0){
                $children = $category->children()->orderBy('name')->get() ;
                foreach ($children as $child){
                    $tree[$category->name] [$child->id]= $child->name;
                }
            }
        }else{
            if( array_key_exists($category->parent->name, $tree)){
                if ($category->children()->count() > 1){
                    foreach ($category->children()->orderBy('name')->get() as $child){
                        $tree[$category->parent->name]  [$child->id] =  $child->name ;
                    }
                }
            }else{
                $tree[$category->name] = [];
                if ($category->children()->count() > 1){
                    foreach ($category->children()->orderBy('name')->get() as $child){
                        $tree[$category->name] [$child->id] = $child->name;
                    }
                }
            }
        }
    }
}
