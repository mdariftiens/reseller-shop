<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\Collection;
use App\Models\User;
use App\Observers\CategoryObserver;
use App\Observers\CollectionObserver;
use App\Observers\OrderObserver;
use App\Observers\UserObserver;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        CategoryObserver::mute();
        CollectionObserver::mute();
        UserObserver::mute();
        OrderObserver::mute();

        \App\Models\User::factory(20)->create();
        \App\Models\Cat::factory(100)->create();
        \App\Models\Collection::factory(10)->create();

        $this->call([
            RolePermissionSeeder::class,
            BusinessCategorySeed::class,
            ShopSettingSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
            NoteSeeder::class,
            BonusTypeNBonusSeeder::class,
            PaidamountSeeder::class,
            UserSeeder::class,

        ]);
    }
}
