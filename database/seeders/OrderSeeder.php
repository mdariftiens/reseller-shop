<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderShipping;
use App\Models\Product;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ( $i = 0; $i < 50; $i++){

            $status = ['ORDER_STATUS_NOT_ACCEPTED', 'ORDER_STATUS_PENDING', 'ORDER_STATUS_ON_THE_WAY', 'ORDER_STATUS_DELIVERED', 'ORDER_STATUS_CANCEL', 'ORDER_STATUS_RETURNED'][$faker->numberBetween(0,5)];

            $deliveryMan = User::where('type','delivery-man')->inRandomOrder()->first();
            $customer = User::where('type','customer')->inRandomOrder()->first();

            $order = Order::create([
                'status' => $status,
                'deliveryman_user_id' => $deliveryMan->id,
                'created_by_user_id' => $customer->id,
                'updated_by_user_id' => $customer->id,
            ]);


            $products = Product::inRandomOrder()->take($faker->numberBetween(1, 5))->get();

            $originalPriceTotal = 0;
            $sellingPriceTotal = 0;
            $profitTotal = 0;
            $noOfProduct = $products->count();

            foreach ( $products as $product){

                $quantity = $faker->numberBetween(1,3);
                $original_price = $product->regular_price * $quantity;
                $selling_price = $product->offer_price * $quantity;
                $profit = $original_price - $selling_price;

                $originalPriceTotal+= $original_price;
                $sellingPriceTotal+= $selling_price;
                $profitTotal+=$profit;

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'original_price' => $original_price,
                    'selling_price' => $selling_price,
                    'profit' => $profit,
                ]);
            }

            $order->offer_price_total = $originalPriceTotal;
            $order->selling_price_total = $sellingPriceTotal;
            $order->profit_total = $profitTotal;
            $order->no_of_product = $noOfProduct;
            $order->save();

            OrderShipping::create([
                'order_id' => $order->id,
                'name' => $faker->name,
                'address' => $faker->address,
                'optional_address' => $faker->address,
                'mobile_number' => $faker->e164PhoneNumber,
            ]);
        }

    }
}
