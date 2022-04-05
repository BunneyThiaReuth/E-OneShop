<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_proImport', function (Blueprint $table) {
            $table->increments('impID');
            $table->string('date');
            $table->integer('proID');
            $table->integer('qty');
            $table->double('price');
            $table->integer('emplID');

            $table->foreign('proID')->references('proID')->on('tbl_products');
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
        Schema::dropIfExists('tbl_proImport');
    }
}
