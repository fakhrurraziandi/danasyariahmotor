<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoMotorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_motor', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('motor_id')->unsigned();
            $table->foreign('motor_id')->references('id')->on('motor')->onDelete('cascade');
            
            $table->string('photo');
            $table->softDeletes();
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
        Schema::dropIfExists('photo_motor');
    }
}
