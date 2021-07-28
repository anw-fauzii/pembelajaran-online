<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absen;
use App\Models\Siswa;
use App\Models\Tugas;

class HomeController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('Ortu')){
            $siswa = Siswa::where('user_ortu', Auth::user()->id)->first();
            $absen = Absen::where('siswa_id', $siswa->nis)->get();
            $tugas = Tugas::where('siswa_id', $siswa->nis)->get();
            return view('dashboard', compact('absen','tugas','siswa'));
        }
        elseif(Auth::user()->hasRole('Admin')){
            return view('dashboard');
        }
        elseif(Auth::user()->hasRole('Guru')){
            return view('dashboard');
        }
        elseif(Auth::user()->hasRole('Siswa')){
            $siswa = Siswa::where('nis', Auth::user()->id)->first();
            $absen = Absen::where('siswa_id', Auth::user()->id)->get();
            $tugas = Tugas::where('siswa_id', Auth::user()->id)->get();
            return view('dashboard', compact('absen','tugas','siswa'));
        }
    }
}
