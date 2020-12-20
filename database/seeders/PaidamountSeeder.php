<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Paidamount;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PaidamountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        $orders = Order::inRandomOrder()->take(25)->get();

        $customerUserIds = array_unique($orders->pluck('created_by_user_id')->toArray());

        $creatorId = User::where('type','admin')->inRandomOrder()->first()->id;

        foreach ( $customerUserIds as $customerUserId){

            Paidamount::create([
                'customer_user_id' => $customerUserId,
                'method' => ['bKash', 'Bank'] [$faker->numberBetween(0, 1)],
                'note' => $faker->paragraph,
                'amount' => $faker->numberBetween(50,500),
                'created_by_user_id' => $creatorId,
                'updated_by_user_id' => $creatorId,
            ]);
        }
    }
}
