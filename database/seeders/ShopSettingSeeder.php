<?php

namespace Database\Seeders;

use App\Models\BusinessCategory;
use App\Models\BusinessCategory_ShopSetting;
use App\Models\ShopSetting;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ShopSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $users = User::all();

        foreach ( $users as $user){

                $paymentMethod = ['bKash','Bank'][$faker->numberBetween(0,1)];

                $shopSetting = ShopSetting::create([
                    'user_id' => $user->id,
                    'shop_name' => $faker->name,
                    'payment_method' => $paymentMethod ,
                    'bank_account_holder_name' => $faker->name,
                    'back_account_name' => $faker->bankAccountNumber,
                    'bank_name_and_branch' => $faker->address,
                    'business_type' => ['Website','FB page','Shop Showroom','Nothing'][rand(0,3)],
                    'experience' => ['Experienced','No Experience'][rand(0,1)],
                    'age_of_business' => ['New', '1-3 Year(s)','1-5 Year(s)','5+ Years'][rand(0,3)],
                    'fb_page_link' => $faker->domainName,
                    'website_url' => $faker->domainName,
                    'bkash_mobile_number' => $faker->e164PhoneNumber,
                ]);

                $businessCategories = BusinessCategory::inRandomOrder()->take(3)->get();

                foreach ($businessCategories as $businessCategory ){
                    BusinessCategory_ShopSetting::create([
                        'business_category_id' => $businessCategory->id,
                        'shop_setting_id' => $shopSetting->id
                    ]);
                }

        }
    }
}
