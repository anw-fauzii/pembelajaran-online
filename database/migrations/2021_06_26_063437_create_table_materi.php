<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMateri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_materi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('jadwal_id')->unsigned();
            $table->bigInteger('kelas_id')->unsigned();
            $table->date('tanggal')->nullable();
            $table->string('judul');
            $table->text('materi');
            $table->text('keterangan_tugas')->nullable();
            $table->timestamps();

            $table->foreign('jadwal_id')->references('id')->on('jadwal')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_materi');
    }
}
