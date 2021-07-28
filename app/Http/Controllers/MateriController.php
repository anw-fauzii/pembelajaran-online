<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\TahunAjaran;
use App\Models\MateriKelas;
use App\Models\MateriFile;
use App\Models\Jadwal;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('Siswa')){
            $jadwal = Jadwal::where('guru_id', Auth::user()->id)->get();
            $siswa = Siswa::where('nis', Auth::user()->id)->first();
            $materi = Materi::join('jadwal','materi.jadwal_id','=','jadwal.id')->where('kelas_id', $siswa->kelas_id)->get();
            return view('materi.index',compact('materi','jadwal'));
        }
        if(Auth::user()->hasRole('Guru')){
            $jadwal = Jadwal::where('guru_id', Auth::user()->id)->get();
            if ($request->ajax()) {
                $data = Materi::select('materi.*','materi_kelas.materi_id')->join('materi_kelas','materi.id','=','materi_kelas.materi_id')->distinct('materi_id')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit"><i class="metismenu-icon pe-7s-pen"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="metismenu-icon pe-7s-trash"></i></a>';
                            return $btn;
                    })
                    ->addColumn('pertemuan', function($data){
                        return $data->pertemuan;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
            return view('materi.index',compact('jadwal'));
        }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10 ; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        //SIMPAN MATERI
        if($request->get('materi_id')){
            $materi = Materi::find($request->get('materi_id'));
        }else{
            $materi = new Materi;
        }
        $materi->kode = $randomString;
        $materi->judul = $request->get('judul');
        $materi->pertemuan = $request->get('pertemuan');
        $materi->keterangan = $request->get('keterangan');
        $materi->save();
        if($request->get('jadwal_id')){
            foreach($request->get('jadwal_id') as $jadwal_id){
                $materi->materiKelas()->save(new MateriKelas(['jadwal_id'=>$jadwal_id]));
            }
            foreach($request->get('jadwal_id') as $jadwal_id){
                $kelas = Jadwal::find($jadwal_id);
                $siswa = Siswa::where('kelas_id', $kelas->kelas_id)->get();
                foreach($siswa as $user){
                    $materi->tugas()->save(new Tugas(['siswa_id'=>$user->nis, 'status'=>"Belum Selesai", 'jadwal_id' => $jadwal_id]));
                }
            }
        }
        if($request->file('materi')){
            foreach($request->file('materi') as $materiFile){
                $file = $materiFile->store('Materi', 'public');
                $materi->materiFile()->save(new MateriFile(['file'=>$file]));
            }
        }
        
        return redirect()->back()->with('sukses','Berhasil Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $pelajaran = Jadwal::find($id);
        $materi = Materi::select('materi.*','materi_kelas.materi_id')->with('tugas')
            ->join('materi_kelas','materi.id','=','materi_kelas.materi_id')
            ->where('jadwal_id', $pelajaran->id)->distinct('materi_id')
            ->orderBy('created_at', 'DESC')->get();
        if (Auth::user()->hasRole('Guru')){
                $siswa = Tugas::where('jadwal_id', $pelajaran->id)->get();
                $ajaran = TahunAjaran::latest()->first();
                $jadwal = Jadwal::where('guru_id', Auth::user()->id)->where('tp',$ajaran->tp)->get();
                $tugas = Siswa::where('kelas_id', $pelajaran->kelas_id)->get();
                $pertemuan = Tugas::select('materi_id')->where('jadwal_id', $pelajaran->id)->distinct('materi_id')->get();
                $nilai = Tugas::where('jadwal_id', $pelajaran->id)->get();
                $absen = Absen::all();
                return view('ngajar.guru',compact('materi','pelajaran','siswa','jadwal','tugas','nilai','pertemuan','absen'));
        }
        elseif(Auth::user()->hasRole('Siswa')){  
                $siswa = Siswa::where('nis', Auth::user()->id)->first();
                $jadwal = Jadwal::where('kelas_id', $siswa->kelas_id)->get();
                $tugas_siswa = Tugas::where('siswa_id', Auth::user()->id)->where('jadwal_id', $pelajaran->id)->get();
                return view('ngajar.siswa',compact('materi','pelajaran','jadwal','tugas_siswa'));
        }
        elseif(Auth::user()->hasRole('Ortu')){  
            $siswa = Siswa::where('user_ortu', Auth::user()->id)->first();
            $jadwal = Jadwal::where('kelas_id', $siswa->kelas_id)->get();
            $absen_siswa = Absen::where('siswa_id', $siswa->nis)->get();
            $ortu_siswa = Tugas::where('siswa_id', $siswa->nis)->where('jadwal_id', $pelajaran->id)->get();
            return view('ngajar.ortu',compact('materi','pelajaran','jadwal','ortu_siswa','absen_siswa'));
    }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        //
    }
}
