<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswa";
    protected $fillable =[
        'kelas_id',
        'nis',
        'nama',
        'jk',
        'user_ortu',
        'ortu',
        'kontak'
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
}
