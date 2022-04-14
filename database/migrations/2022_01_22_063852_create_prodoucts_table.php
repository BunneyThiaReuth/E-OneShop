<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdouctsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->increments('proID');
            $table->integer('imgID');
            $table->string('name');
            $table->integer('cateID');
            $table->integer('qty');
            $table->double('price');
            $table->integer('discountID');
            $table->string('desc');

            $table->foreign('imgID')->references('imgID')->on('tbl_image');
            $table->foreign('cateID')->references('cateID')->on('tbl_category');
            $table->foreign('discountID')->references('discountID')->on('tbl_discount');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_products');
    }
}
