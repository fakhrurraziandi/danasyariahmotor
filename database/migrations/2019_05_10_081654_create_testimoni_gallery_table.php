<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimoniGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimoni_gallery', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('message');
            $table->string('photo');
            $table->enum('type', ['pembiayaan_dana', 'kredit_motor'])->default('pembiayaan_dana');
            $table->integer('wilayah_pembiayaan_dana_id')->nullable();
            $table->integer('wilayah_kredit_motor_id')->nullable();
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
        Schema::dropIfExists('testimoni_gallery');
    }
}
