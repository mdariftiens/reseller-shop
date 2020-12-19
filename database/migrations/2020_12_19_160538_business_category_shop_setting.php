<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BusinessCategoryShopSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BusinessCategory_ShopSetting', function ( Blueprint $table){
           $table->id();
           $table->unsignedBigInteger('business_category_id');
           $table->unsignedBigInteger('shop_setting_id');
           $table->timestamps();

           $table->foreign('business_category_id')->references('id')->on('business_category');
           $table->foreign('shop_setting_id')->references('id')->on('shop_settings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BusinessCategory_ShopSetting');
    }
}
