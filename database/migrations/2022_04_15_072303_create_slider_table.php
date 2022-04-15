<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tble_slider', function (Blueprint $table) {
            $table->increments('shlideID');
            $table->integer('imageID');
            $table->string('slidename');
            $table->string('text');
            $table->string('description');
            $table->integer('status');
            $table->foreign('imageID')->references('imgID')->on('tbl_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tble_slider');
    }
}
