<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\CatProduct;
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
            $slug = Str::slug($name);
            $regularPrice = $faker->numberBetween(100,1000);
            $offerPrice = $regularPrice - 50;
            $userId = User::where('type','admin')->inRandomOrder()->first()->id;

            $product = Product::create([
                'name' => $name,
                'slug' => $slug,
                'description' => $faker->paragraphs(5, true),
                'disclaimer' => $faker->paragraphs(2, true),
                'regular_price' => $regularPrice,
                'offer_price' => $offerPrice,
                'created_by_user_id' => $userId,
                'updated_by_user_id' => $userId,
            ]);

            $cats = Cat::inRandomOrder()->take(3)->get();

            foreach ($cats as $cat){
                CatProduct::create([
                    'cat_id' => $cat->id,
                    'product_id' => $product->id
                ]);
            }
        }


    }
}
