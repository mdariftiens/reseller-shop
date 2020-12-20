<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaidamountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paidamount', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_user_id');
            $table->enum('method',['bKash', 'Bank'])->default('bKash');
            $table->text('note')->nullable();
            $table->float('amount');
            $table->unsignedBigInteger('created_by_user_id');
            $table->unsignedBigInteger('updated_by_user_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign(['customer_user_id'])->references('id')->on('users');
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
        Schema::dropIfExists('paidamount');
    }
}
