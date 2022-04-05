<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_InvoiceDetail', function (Blueprint $table) {
            $table->increments('invID');
            $table->integer('invNumber');
            $table->integer('proID');
            $table->integer('qty');
            $table->double('price');
            $table->double('totalPayment');

            $table->foreign('proID')->references('proID')->on('tbl_products');
            $table->foreign('invNumber')->references('invNumber')->on('tbl_Invoice');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_InvoiceDetail');
    }
}
