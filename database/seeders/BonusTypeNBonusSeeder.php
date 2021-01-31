<?php

namespace Database\Seeders;

use App\Models\Bonus;
use App\Models\BonusType;
use App\Models\Order;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BonusTypeNBonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $user = User::where('type','admin')->inRandomOrder()->first();

        $bonusTypes = ['Festival', 'Sales Bonus','Others'];

        foreach ($bonusTypes as $bonusType){

            BonusType::create([
                'name' => $bonusType,
                'created_by_user_id' => $user->id,
                'updated_by_user_id' => $user->id
            ]);
        }

        $orders = Order::inRandomOrder()->take(25)->get();
        $customerUserIds = $orders->pluck('created_by_user_id')->toArray();

        foreach ( $customerUserIds as $customerUserId){
            $creatorId = User::where('type','admin')->inRandomOrder()->first()->id;

            Bonus::create([
                'shopsetting_id' => $customerUserId,
                'bonus_type_id' => $faker->numberBetween(1, count($bonusTypes) - 1),
                'description' => $faker->paragraph,
                'amount' => $faker->numberBetween(50,500),
                'created_by_user_id' => $creatorId,
                'updated_by_user_id' => $creatorId,
            ]);
        }

    }
}
