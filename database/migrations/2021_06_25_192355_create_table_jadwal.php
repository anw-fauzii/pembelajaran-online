<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableJadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kelas_id')->unsigned();
            $table->integer('mapel_id')->unsigned();
            $table->enum('hari',['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->bigInteger('guru_id')->unsigned();
            $table->timestamps();

            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mapel_id')->references('id')->on('mapel')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('guru_id')->references('nip')->on('guru')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_jadwal');
    }
}
