<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\User;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $absen = Absen::whereUserId(auth()->user()->id)->whereTanggal(date('Y-m-d'))->first();
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
        return view('dashboard', compact('absen','libur','holiday'));
    }

    public function absen(Request $request)
    {
        $users = User::all();
        $alpha = false;

        if (date('l') == 'Saturday' || date('l') == 'Sunday') {
            return redirect()->back()->with('error','Hari Libur Tidak bisa Check In');
        }

        foreach ($users as $user) {
            $absen = Absen::whereUserId($user->id)->whereTanggal(date('Y-m-d'))->first();
            if (!$absen) {
                $alpha = true;
            }
        }

        if ($alpha) {
            foreach ($users as $user) {
                if ($user->id != $request->user_id) {
                    Absen::create([
                        'keterangan'    => 'Alpha',
                        'tanggal'       => date('Y-m-d'),
                        'user_id'       => $user->id
                    ]);
                }
            }
        }

        $absen = Absen::whereUserId($request->user_id)->whereTanggal(date('Y-m-d'))->first();
        if ($absen) {
            if ($absen->keterangan == 'Alpha') {
                $data['jam_absen']  = date('H:i:s');
                $data['tanggal']    = date('Y-m-d');
                $data['user_id']    = $request->user_id;
                if (strtotime($data['jam_absen']) >= strtotime('07:00:00') && strtotime($data['jam_absen']) <= strtotime('08:00:00')) {
                    $data['keterangan'] = 'Masuk';
                } else if (strtotime($data['jam_absen']) > strtotime('08:00:00') && strtotime($data['jam_absen']) <= strtotime('17:00:00')) {
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
        $data['user_id']    = $request->user_id;
        if (strtotime($data['jam_absen']) >= strtotime('07:00:00') && strtotime($data['jam_absen']) <= strtotime('08:00:00')) {
            $data['keterangan'] = 'Masuk';
        } else if (strtotime($data['jam_absen']) > strtotime('08:00:00') && strtotime($data['jam_absen']) <= strtotime('17:00:00')) {
            $data['keterangan'] = 'Telat';
        } else {
            $data['keterangan'] = 'Alpha';
        }

        Absen::create($data);
        return redirect()->back()->with('success','Check-in berhasil');
    }
}
