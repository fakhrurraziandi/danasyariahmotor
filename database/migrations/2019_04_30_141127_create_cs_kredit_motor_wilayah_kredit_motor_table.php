<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCsKreditMotorWilayahKreditMotorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cs_kredit_motor_wilayah_kredit_motor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cs_kredit_motor_id');
            $table->integer('wilayah_kredit_motor_id');
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
        Schema::dropIfExists('cs_kredit_motor_wilayah_kredit_motor');
    }
}
