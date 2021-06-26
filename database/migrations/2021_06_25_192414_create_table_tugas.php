<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('jadwal_id')->unsigned();
            $table->bigInteger('siswa_id')->unsigned();
            $table->date('tanggal')->nullable();
            $table->text('tugas');
            $table->text('keterangan_tugas')->nullable();
            $table->integer('nilai')->nullable();
            $table->timestamps();

            $table->foreign('jadwal_id')->references('id')->on('jadwal')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('table_tugas');
    }
}
