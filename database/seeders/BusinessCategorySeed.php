<?php

namespace Database\Seeders;

use App\Models\BusinessCategory;
use Illuminate\Database\Seeder;

class BusinessCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            "Women’s Clothing",
            "Men’s Clothing",
            "Mobile, Gadgets & Accessories",
            "Computer & Home Appliance",
            "Shoes, Bag & Leather Items",
            "Kids, Mother  & Baby items",
            "Home & living",
            "Makeup & Cosmetics",
            "Watch,Sunglasses,Perfume & Jewellery",
            "Book,Sports & Travels",
            "Multi Products",
            "Others",
        ];

        foreach ( $names as  $value){
            BusinessCategory::create([
                'name'=>$value,
                'enabled'=>true,
                'created_by_user_id'=> 1,
                'updated_by_user_id'=> 1
            ]);
        }

    }
}
