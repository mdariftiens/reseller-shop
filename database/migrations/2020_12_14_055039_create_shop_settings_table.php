<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('payment_method');
            $table->string('bank_account_holder_name')->nullable();
            $table->string('back_account_name')->nullable();
            $table->string('bank_name_and_branch')->nullable();
            $table->string('bkash_mobile_number')->nullable();

            $table->enum('business_type',['Website','FB page','Shop Showroom','Nothing']);
            $table->enum('experience', ['Experienced','No Experience']);
            $table->enum('age_of_business',['New', '1-3 Year(s)','1-5 Year(s)','5+ Years']);
            $table->string('fb_page_link')->nullable();
            $table->string('website_url')->nullable();

            $table->timestamps();
            $table->softDeletes();


            $table->foreign(['user_id'])
                ->references('id')
                ->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_settings');
    }
}
