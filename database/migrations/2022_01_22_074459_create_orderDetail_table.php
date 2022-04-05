<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_OrderDetail', function (Blueprint $table) {
            $table->increments('orderID');
            $table->integer('orderNumber');
            $table->integer('proID');
            $table->integer('qty');
            $table->double('price');
            $table->double('totalAmount');

            $table->foreign('orderNumber')->references('orderNumber')->on('tbl_Order');
            $table->foreign('proID')->references('proID')->on('tbl_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_OrderDetail');
    }
}
