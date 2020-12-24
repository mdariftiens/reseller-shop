<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //image -> should be used by mediable

        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('parent_id')->nullable()->default(1);
            $table->boolean('enabled')->default(true);
            $table->text('description')->nullable();
            $table->integer('no_of_products')->default(0);
            $table->integer('min_offer_price')->default(0);
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
        Schema::dropIfExists('cats');
    }
}
