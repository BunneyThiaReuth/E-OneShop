<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_Payment', function (Blueprint $table) {
            $table->increments('paymentID');
            $table->integer('orderNumber');
            $table->string('date');
            $table->integer('paymentTypeID');
            $table->integer('status');

            $table->foreign('orderNumber')->references('orderNumber')->on('tbl_Order');
            $table->foreign('paymentTypeID')->references('typeID')->on('tbl_PaymentType');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_Payment');
    }
}
