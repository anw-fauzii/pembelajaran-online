<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = "tugas";
    protected $fillable = [
        'materi_id',
        'siswa_id',
        'jadwal_id',
        'tanggal',
        'tugas',
        'keterangan',
        'nilai',
        'diskusi',
        'status',
        'created_at'
    ];

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'siswa_id', 'nis');
    }
    public function materi(){
        return $this->belongsTo(Materi::class);
    }
    public function jadwal(){
        return $this->belongsTo(Jadwal::class);
    }
}
