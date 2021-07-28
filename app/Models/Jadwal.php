<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = "jadwal";
    protected $fillable = [
        'id',
        'kelas_id',
        'mapel_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'guru_id',
        'tp'
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function mapel(){
        return $this->belongsTo(Mapel::class);
    }

    public function guru(){
        return $this->belongsTo(Guru::class,'guru_id', 'nip');
    }

}
