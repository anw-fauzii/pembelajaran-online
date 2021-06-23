<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = "absen";

    protected $fillable = [
        'user_id', 'tanggal', 'keterangan', 'jam_absen'
    ];
    
}
