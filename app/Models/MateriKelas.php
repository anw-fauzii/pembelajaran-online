<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriKelas extends Model
{
    use HasFactory;
    protected $table= "materi_kelas";
    protected $fillable =[
        'materi_id','jadwal_id'
    ];

    public function materi(){
        return $this->belongsTo(Materi::class);
    }
}
