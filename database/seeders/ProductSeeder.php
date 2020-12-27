<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\CatProduct;
use App\Models\Collection;
use App\Models\Product;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker  = Factory::create();

        for ($i = 0; $i<100; $i++){

            $name = $faker->unique()->sentence;
            $regularPrice = $faker->numberBetween(100,1000);
            $offerPrice = $regularPrice - 50;
            $userId = User::where('type','admin')->inRandomOrder()->first()->id;

            $collection = Collection::inRandomOrder()->first();

            $product = Product::create([
                'name' => $name,
                'code' => $faker->unique()->postcode,
                'description' => $faker->paragraphs(5, true),
                'disclaimer' => $faker->paragraphs(2, true),
                'regular_price' => $regularPrice,
                'offer_price' => $offerPrice,
                'collection_id' => $collection->id,
                'created_by_user_id' => $userId,
                'updated_by_user_id' => $userId,
            ]);

            $collection->no_of_products++;

            if ( $collection->min_offer_price == 0 ||  $collection->min_offer_price > $offerPrice){
                $collection->min_offer_price = $offerPrice;
            }

            $collection->save();

            $cats = Cat::inRandomOrder()->take(3)->get();

            foreach ($cats as $cat){
                CatProduct::create([
                    'cat_id' => $cat->id,
                    'product_id' => $product->id
                ]);

                $cat->no_of_products++;

                if ( $cat->min_offer_price == 0 ||  $cat->min_offer_price > $offerPrice){
                    $cat->min_offer_price = $offerPrice;
                }

                $cat->save();

            }




        }


    }
}
