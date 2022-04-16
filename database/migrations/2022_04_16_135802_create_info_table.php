<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_info', function (Blueprint $table) {
            $table->increments('infoID');
            $table->string('email');
            $table->string('infortext');
            $table->integer('moblienumber');
            $table->string('incity');
            $table->text('inaddress');
            $table->text('linkmap');
            $table->integer('instatus');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_info');
    }
}
