<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotorWarnaMotorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor_warna_motor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('motor_id')->unsigned();
            $table->foreign('motor_id')->references('id')->on('motor')->onDelete('cascade');
            $table->bigInteger('warna_motor_id')->unsigned();
            $table->foreign('warna_motor_id')->references('id')->on('warna_motor')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motor_warna_motor');
    }
}
