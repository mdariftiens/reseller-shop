<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('order_summary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->float('original_price_total')->default(0);
            $table->float('selling_price_total')->default(0);
            $table->float('profit_total')->default(0);

            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_summary');
    }
}
