<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->text('disclaimer')->nullable();
            $table->float('regular_price')->default(0);
            $table->float('offer_price')->default(0);
            $table->boolean('enabled')->default(true);
            $table->integer('delivery_within_days')->default(3);
            $table->unsignedBigInteger('created_by_user_id');
            $table->unsignedBigInteger('updated_by_user_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by_user_id')->references('id')->on('users');
            $table->foreign('updated_by_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
