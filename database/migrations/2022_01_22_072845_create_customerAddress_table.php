<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_CustomerAddress', function (Blueprint $table) {
            $table->increments('addressID');
            $table->text('address1');
            $table->text('address2');
            $table->string('email');
            $table->string('city');
            $table->integer('postCode');
            $table->string('country');
            $table->integer('mobilePhone');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_CustomerAddress');
    }
}
