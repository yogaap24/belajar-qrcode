<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertifikatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifikat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir');
            $table->integer('gender')->unsigned();
            $table->integer('no_sertifikat')->unsigned();
            $table->date('tanggal_test');
            $table->integer('id_test')->unsigned();
            $table->string('sect_1');
            $table->integer('score_1')->unsigned();
            $table->string('sect_2');
            $table->integer('score_2')->unsigned();
            $table->string('sect_3');
            $table->integer('score_3')->unsigned();
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
        Schema::dropIfExists('sertifikat');
    }
}
