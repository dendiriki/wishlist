<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RiwayatPoint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_poin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_user');
            $table->unsignedBigInteger('id_point');
            $table->unsignedBigInteger('id_user');
            $table->integer('jumlah_point');
            $table->string('keterangan');
            $table->timestamps();
            $table->foreign('id_point')->references('id')->on('points')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_point');
    }
}
