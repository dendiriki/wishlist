<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Notifikasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_point');
            $table->unsignedBigInteger('id_riwayat');
            $table->string('nama_bank');
            $table->string('no_rek');
            $table->string('telpon');
            $table->string('pesan');
            $table->string('keterangan');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_point')->references('id')->on('points')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_riwayat')->references('id')->on('riwayat_poin')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifikasi');
    }
}
