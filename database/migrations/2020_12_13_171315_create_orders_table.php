<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['ORDER_STATUS_NOT_ACCEPTED', 'ORDER_STATUS_PENDING', 'ORDER_STATUS_ON_THE_WAY', 'ORDER_STATUS_DELIVERED', 'ORDER_STATUS_CANCEL', 'ORDER_STATUS_RETURNED'])
                ->default('ORDER_STATUS_NOT_ACCEPTED');
            $table->string('invoice_number')->nullable();
            $table->unsignedBigInteger('deliveryman_user_id')->nullable();
            $table->unsignedBigInteger('created_by_user_id');
            $table->unsignedBigInteger('updated_by_user_id');

            $table->float('offer_price_total')->default(0);
            $table->float('selling_price_total')->default(0);
            $table->float('profit_total')->default(0);
            $table->float('delivery_charge')->default(0);
            $table->unsignedInteger('no_of_product')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign(['deliveryman_user_id'])->references('id')->on('users');
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
        Schema::dropIfExists('orders');
    }
}
