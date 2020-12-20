<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\Order;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $orders = Order::all();

        foreach ($orders as $order){

            $customer = User::where('id', $order->created_by_user_id)->first();

            for ($i=0; $i< $faker->numberBetween(1,3); $i++){
                Note::create([
                    'order_id' => $order->id,
                    'note' => $faker->paragraph,
                    'created_by_user_id' => $customer->id,
                    'updated_by_user_id' =>  $customer->id,
                ]);
            }

        }

    }
}
