<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_Order', function (Blueprint $table) {
            $table->increments('orderNumber');
            $table->integer('customerID');
            $table->integer('emplID');
            $table->string('date');
            $table->integer('status');

            $table->foreign('customerID')->references('customerID')->on('tbl_Customer');
            $table->foreign('emplID')->references('emplID')->on('tbl_employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_Order');
    }
}
