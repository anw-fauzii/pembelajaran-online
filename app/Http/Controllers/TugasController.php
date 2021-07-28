<?php

namespace App\Http\Controllers;
use App\Models\Absen;
use App\Models\Tugas;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $materi_id, $jadwal_id)
    {
        $data = Tugas::where('materi_id', $materi_id)->where('jadwal_id', $jadwal_id)->get();
        if ($request->ajax()) {
            $data = Tugas::where('materi_id', $materi_id)->where('jadwal_id', $jadwal_id)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip" title="Beri Nilai" data-id="'.$row->id.'" data-original-title="Beri Nilai" class="edit btn btn-info btn-sm edit"><i class="metismenu-icon pe-7s-note"></i></a>';
                        return $btn;
                    })
                    ->addColumn('siswa', function($data){
                        return $data->siswa->nama;
                    })
                    ->addColumn('tugas', function($data){
                        if($data->tugas != NULL){
                            $btn = '<a href="'.asset('storage/'.$data->tugas).'" data-toggle="tooltip" title="Nilai" data-id="'.$data->id.'" data-original-title="Nilai" class="nilai btn btn-info btn-sm nilai">Tugas Siswa</a>';
                            return $btn;
                        }else{
                            return "Tidak Ada";
                        }
                    })
                    ->rawColumns(['action','tugas'])
                    ->make(true);
        }
        return view('tugas.show', compact('data'));
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
        $tugas = Tugas::find($request->tugas_id);
        if($request->file('tugas')){
            $file = $request->file('tugas')->store('Tugas', 'public');
            $tugas->tugas = $file;
        }
        $tugas->nilai = $request->nilai;
        $tugas->keterangan = $request->keterangan;
        $tugas->status = "Selesai";
        if($request->get('dinilai')){
            $tugas->status = "Dinilai";
        }
        $tugas->diskusi = $request->get('diskusi');
        $tugas->save();
        return redirect()->back()->with('sukses','Tugas Berhasil Dikerjakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if(Auth::user()->hasRole('Guru')){
            if($request->get('filter')){
                $kelasss = Kelas::find($id);
                $jadwal = Jadwal::select('mapel_id','id')->where('kelas_id', $id)->distinct('mapel_id')->get();
                $siswa = Siswa::where('kelas_id', $id)->get();
                $materi = Tugas::select('materi_id')->where('jadwal_id', $request->get('mapel'))->distinct('materi_id')->get();
                $nilai = Tugas::where('jadwal_id', $request->get('mapel'))->get();
                $absen = Absen::all();
                $judul = Jadwal::find($request->get('mapel'));
                return view('ngajar.wali', compact('judul','absen','kelasss','jadwal','siswa','nilai','materi'));
            }else{
                $kelasss = Kelas::find($id);
                $jadwal = Jadwal::select('mapel_id','id')->where('kelas_id', $id)->distinct('mapel_id')->get();
                $siswa = Siswa::where('kelas_id', $id)->get();
                $materi = Tugas::where('jadwal_id', 3712313166)->get();
                $nilai = Tugas::where('jadwal_id', 3712313166)->get();
                $judul = "";
                $absen = Absen::all();
                return view('ngajar.wali', compact('judul','absen','kelasss','jadwal','siswa','nilai','materi'));
            }
        }
        else if (Auth::user()->hasRole('Ortu')){ 
            $siswa = Siswa::where('user_ortu', Auth::user()->id)->first();
            $tp = Jadwal::select('tp')->where('kelas_id', $siswa->kelas_id)->distinct('tp')->get();
            $ajaran = TahunAjaran::latest()->first();
            $absen_siswa = Absen::where('siswa_id', $siswa->nis)->get();
            $jadwal = Jadwal::where('kelas_id', $siswa->kelas_id)->where('tp',$ajaran->tp)->get();
            return view('ngajar.wali', compact('jadwal','tp','absen_siswa'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tugas = Tugas::find($id);
        return response()->json($tugas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tugas $tugas)
    {
        //
    }
}
