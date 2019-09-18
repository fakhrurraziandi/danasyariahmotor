<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotorPembiayaanDanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor_pembiayaan_dana', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            
            $table->bigInteger('pabrikan_motor_id')->unsigned();
            $table->foreign('pabrikan_motor_id')->references('id')->on('pabrikan_motor')->onDelete('cascade');

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
        Schema::dropIfExists('motor_pembiayaan_dana');
    }
}
