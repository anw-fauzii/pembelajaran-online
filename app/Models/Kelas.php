<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";
    protected $fillable = [
        'nama',
        'jurusan_id',
        'guru_id',
        'angkatan'
    ];

    public function jurusan(){
        return $this->belongsTo(Jurusan::class);
    }

    public function guru(){
        return $this->belongsTo(Guru::class,'guru_id', 'nip');
    }

    public function siswa(){
        return $this->hasMany(Siswa::class);
    }    
}

