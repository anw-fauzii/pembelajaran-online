<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAbsen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('siswa_id')->unsigned()->nullable();
            $table->date('tanggal')->nullable();
            $table->time('jam_absen')->nullable();
            $table->enum('keterangan',['Tepat Waktu','Alpha','Telat','Sakit']);
            $table->timestamps();

            $table->foreign('siswa_id')->references('nis')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_absen');
    }
}
