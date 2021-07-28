<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\AbsenMapel;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $absen = Absen::whereSiswaId(auth()->user()->id)->whereTanggal(date('Y-m-d'))->first();
        $url = 'https://kalenderindonesia.com/api/YZ35u6a7sFWN/libur/masehi/'.date('Y/m');
        $kalender = file_get_contents($url);
        $kalender = json_decode($kalender, true);
        $libur = false;
        $holiday = null;
        if ($kalender['data'] != false) {
            foreach ($kalender['data']['holiday']['data'] as $key => $value) {
                if ($value['date'] == date('Y-m-d')) {
                    $holiday = $value['name'];
                    $libur = true;
                    break;
                }
            }
        }
        return view('absen.harian', compact('absen','libur','holiday'));
    }

    public function harian(Request $request)
    {
        $siswa = Siswa::All();
        $alpha = false;

        foreach ($siswa as $user) {
            $absen = Absen::whereSiswaId($user->nis)->whereTanggal(date('Y-m-d'))->first();
            if (!$absen) {
                $alpha = true;
            }
        }

        if ($alpha) {
            foreach ($siswa as $user) {
                if ($user->nis != $request->siswa_id) {
                    Absen::create([
                        'keterangan'    => 'Alpha',
                        'tanggal'       => date('Y-m-d'),
                        'siswa_id'       => $user->nis
                    ]);
                }
            }
        }

        $absen = Absen::whereSiswaId($request->siswa_id)->whereTanggal(date('Y-m-d'))->first();
        if ($absen) {
            if ($absen->keterangan == 'Alpha') {
                $data['jam_absen']  = date('H:i:s');
                $data['tanggal']    = date('Y-m-d');
                $data['siswa_id']    = $request->siswa_id;
                $file = $request->file('logo')->store('Foto', 'public');
                $data['foto'] = $file;
                if($request->hadir){
                    if (strtotime($data['jam_absen']) >= strtotime('06:00:00') && strtotime($data['jam_absen']) <= strtotime('07:00:00')) {
                        $data['keterangan'] = 'Tepat Waktu';
                    } else if (strtotime($data['jam_absen']) > strtotime('07:00:00') && strtotime($data['jam_absen']) <= strtotime('23:00:00')) {
                        $data['keterangan'] = 'Telat';
                    } else {
                        $data['keterangan'] = 'Alpha';
                    }
                }
                elseif($request->sakit){
                    $data['keterangan'] = 'Sakit';
                }
                elseif($request->izin){
                    $data['keterangan'] = 'Izin';
                }
                $absen->update($data);
                return redirect()->back()->with('success','Check-in berhasil');
            } else {
                return redirect()->back()->with('error','Check-in gagal');
            }
        }

        $data['jam_absen']  = date('H:i:s');
        $data['tanggal']    = date('Y-m-d');
        $data['siswa_id']    = $request->siswa_id;
        $file = $request->file('logo')->store('Foto', 'public');
        $data['foto'] = $file;
        if($request->hadir){
            if (strtotime($data['jam_absen']) >= strtotime('06:00:00') && strtotime($data['jam_absen']) <= strtotime('07:00:00')) {
                $data['keterangan'] = 'Tepat Waktu';
            } else if (strtotime($data['jam_absen']) > strtotime('07:00:00') && strtotime($data['jam_absen']) <= strtotime('23:00:00')) {
                $data['keterangan'] = 'Telat';
            } else {
                $data['keterangan'] = 'Alpha';
            }
    
        }
        elseif($request->sakit){
            $data['keterangan'] = 'Sakit';
        }
        elseif($request->izin){
            $data['keterangan'] = 'Izin';
        }
        Absen::create($data);
        return redirect()->back()->with('success','Check-in berhasil');
    }

    public function mapel(Request $request)
    {
        $siswa = Siswa::where('kelas_id', $request->kelas_id)->get();
        $alpha = false;

        if (date('l') == 'Sunday') {
            return redirect()->back()->with('error','Hari Libur Tidak bisa Check In');
        }

        foreach ($siswa as $user) {
            $absen = AbsenMapel::whereSiswaId($user->nis)->whereTanggal(date('Y-m-d'))->first();
            if (!$absen) {
                $alpha = true;
            }
        }

        if ($alpha) {
            foreach ($siswa as $user) {
                if ($user->nis != $request->siswa_id) {
                    AbsenMapel::create([
                        'jadwal_id' => $request->jadwal_id,
                        'keterangan'    => 'Alpha',
                        'tanggal'       => date('Y-m-d'),
                        'siswa_id'       => $user->nis
                    ]);
                }
            }
        }

        $absen = AbsenMapel::whereSiswaId($request->siswa_id)->whereTanggal(date('Y-m-d'))->first();
        if ($absen) {
            if ($absen->keterangan == 'Alpha') {
                $data['jam_absen']  = date('H:i:s');
                $data['tanggal']    = date('Y-m-d');
                $data['siswa_id']    = $request->siswa_id;
                $data['jadwal_id']    = $request->jadwal_id;
                if (strtotime($data['jam_absen']) >= strtotime('06:00:00') && strtotime($data['jam_absen']) <= strtotime('07:00:00')) {
                    $data['keterangan'] = 'Tepat Waktu';
                } else if (strtotime($data['jam_absen']) > strtotime('07:00:00') && strtotime($data['jam_absen']) <= strtotime('17:00:00')) {
                    $data['keterangan'] = 'Telat';
                } else {
                    $data['keterangan'] = 'Alpha';
                }
                $absen->update($data);
                return redirect()->back()->with('success','Check-in berhasil');
            } else {
                return redirect()->back()->with('error','Check-in gagal');
            }
        }

        $data['jam_absen']  = date('H:i:s');
        $data['tanggal']    = date('Y-m-d');
        $data['siswa_id']    = $request->siswa_id;
        $data['jadwal_id']    = $request->jadwal_id;
        if (strtotime($data['jam_absen']) >= strtotime('06:00:00') && strtotime($data['jam_absen']) <= strtotime('07:00:00')) {
            $data['keterangan'] = 'Tepat Waktu';
        } else if (strtotime($data['jam_absen']) > strtotime('07:00:00') && strtotime($data['jam_absen']) <= strtotime('17:00:00')) {
            $data['keterangan'] = 'Telat';
        } else {
            $data['keterangan'] = 'Alpha';
        }

        AbsenMapel::create($data);
        return redirect()->back()->with('success','Check-in berhasil');
    }

    public function forum()
    {
        return view('forum');
    }
}
