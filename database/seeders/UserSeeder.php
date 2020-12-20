<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'mobile' => 'admin',
            'code' => '123123',
            'type' => 'admin',
            'is_account_verified' => true,
            'enabled' => true,
        ]);

        User::create([
            'name' => 'Manager',
            'mobile' => 'manager',
            'code' => '123123',
            'type' => 'manager',
            'is_account_verified' => true,
            'enabled' => true,
        ]);

        User::create([
            'name' => 'delivery-man',
            'mobile' => 'delivery-man',
            'code' => '123123',
            'type' => 'delivery-man',
            'is_account_verified' => true,
            'enabled' => true,
        ]);

        User::create([
            'name' => 'customer',
            'mobile' => 'customer',
            'code' => '123123',
            'type' => 'customer',
            'is_account_verified' => true,
            'enabled' => true,
        ]);

        User::create([
            'name' => 'subscriber',
            'mobile' => 'subscriber',
            'code' => '123123',
            'type' => 'subscriber',
            'is_account_verified' => true,
            'enabled' => true,
        ]);
    }
}
