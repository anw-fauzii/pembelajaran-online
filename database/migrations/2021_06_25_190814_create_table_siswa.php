<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->bigIncrements('nis')->unsigned();
            $table->string('nama');
            $table->enum('keterangan',['Laki-Laki','Perempuan']);
            $table->bigInteger('user_ortu')->unsigned();
            $table->string('ortu');
            $table->bigInteger('kontak');
            $table->timestamps();

            $table->foreign('nis')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_ortu')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_siswa');
    }
}
