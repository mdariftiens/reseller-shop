<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shopsetting_id');
            $table->unsignedBigInteger('bonus_type_id');
            $table->text('description');
            $table->float('amount');
            $table->unsignedBigInteger('created_by_user_id');
            $table->unsignedBigInteger('updated_by_user_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('bonus_type_id')->references('id')->on('bonus_types');
            $table->foreign(['created_by_user_id'])->references('id')->on('users');
            $table->foreign(['updated_by_user_id'])->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonus');
    }
}
