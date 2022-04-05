<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_employees', function (Blueprint $table) {
            $table->increments('emplID');
            $table->string('fistName');
            $table->string('lastName');
            $table->string('gender');
            $table->string('position');
            $table->string('email');
            $table->text('address');
            $table->integer('mobilePhone');
            $table->string('password');
            $table->string('empRole');

            $table->foreign('empRole')->references('roleID')->on('tbl_employeeRoles');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_employees');
    }
}
