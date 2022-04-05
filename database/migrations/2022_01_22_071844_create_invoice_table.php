<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_Invoice', function (Blueprint $table) {
            $table->increments('invNumber');
            $table->string('date');
            $table->integer('emplID');
            $table->integer('status');

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
        Schema::dropIfExists('tbl_Invoice');
    }
}
