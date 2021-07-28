<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Materi extends Model
{
    use HasFactory;
    protected $table = "materi";
    protected $fillable = [
        'kode',
        'guru_id',
        'tanggal',
        'judul',
        'keterangan',
        'pertemuan',
        'created_at'
    ];

    public function mapel(){
        return $this->belongsTo(Mapel::class);
    }

    public function materiKelas(){
        return $this->hasMany(MateriKelas::class);
    }

    public function materiFile(){
        return $this->hasMany(MateriFile::class);
    }
    public function tugas(){
        return $this->hasMany(Tugas::class);
    }
    public function tugasSiswa(){
        return $this->hasMany(Tugas::class)->where('siswa_id',Auth::user()->id);
    }
    public function belumSelesai(){
        return $this->hasMany(Tugas::class)->where('status',"Belum Selesai");
    }

    public function selesai(){
        return $this->hasMany(Tugas::class)->where('status',"Selesai");
    }

    public function dinilai(){
        return $this->hasMany(Tugas::class)->where('status',"Dinilai");
    }
}
