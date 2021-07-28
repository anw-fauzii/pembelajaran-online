<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenMapel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "absen_mapel";
    protected $fillable = [
        'jadwal_id',
        'siswa_id',
        'tanggal',
        'jam_absen',
        'keterangan'
    ];
}
