<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_Customer', function (Blueprint $table) {
            $table->increments('customerID');
            $table->string('name');
            $table->string('password');
            $table->integer('addressID');
            $table->string('lastLogin');
            $table->integer('status');

            $table->foreign('addressID')->references('addressID')->on('tbl_CustomerAddress');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_Customer');
    }
}
