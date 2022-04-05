<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_Sales', function (Blueprint $table) {
            $table->increments('saleID');
            $table->string('date');
            $table->integer('emplID');
            $table->integer('proID');
            $table->integer('qty');
            $table->double('price');

            $table->foreign('emplID')->references('emplID')->on('tbl_employees');
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
        Schema::dropIfExists('tbl_Sales');
    }
}
