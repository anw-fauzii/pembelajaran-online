<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\TahunAjaran;
use App\Models\Kelas;
use App\Models\Tugas;
use App\Models\Mapel;
use App\Models\AbsenMapel;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Materi;
use App\Models\MateriKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tp=TahunAjaran::latest()->first();
        $kelas = Kelas::pluck('nama', 'id');
        $mapel = Mapel::pluck('nama_mapel', 'id');
        $guru = Guru::pluck('nama_guru', 'nip');
        if (Auth::user()->hasRole('Admin')){   
            if ($request->ajax()) {
                $data = Jadwal::all();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit"><i class="metismenu-icon pe-7s-pen"></i></a>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="metismenu-icon pe-7s-trash"></i></a>';
        
                                return $btn;
                        })
                        ->addColumn('guru', function($data){
                            return $data->guru->nama_guru;
                        })
                        ->addColumn('kelas', function($data){
                            return $data->kelas->nama;
                        })
                        ->addColumn('mapel', function($data){
                            return $data->mapel->nama_mapel;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('jadwal.index', compact('kelas','guru','mapel','tp'));
        }
        else if (Auth::user()->hasRole('Guru')){   
            $tp = Jadwal::select('tp')->where('guru_id', Auth::user()->id)->distinct('tp')->get();
            $ajaran = TahunAjaran::latest()->first();
            $jadwal = Jadwal::where('guru_id', Auth::user()->id)->where('tp',$ajaran->tp)->get();
            return view('ngajar.index', compact('jadwal','tp'));
        }
        else if (Auth::user()->hasRole('Siswa')){ 
            $siswa = Siswa::where('nis', Auth::user()->id)->first();
            $tp = Jadwal::select('tp')->where('kelas_id', $siswa->kelas_id)->distinct('tp')->get();
            $ajaran = TahunAjaran::latest()->first();
            $jadwal = Jadwal::where('kelas_id', $siswa->kelas_id)->where('tp',$ajaran->tp)->get();
            return view('ngajar.index', compact('jadwal','tp'));
        }
        else if (Auth::user()->hasRole('Ortu')){ 
            $siswa = Siswa::where('user_ortu', Auth::user()->id)->first();
            $tp = Jadwal::select('tp')->where('kelas_id', $siswa->kelas_id)->distinct('tp')->get();
            $ajaran = TahunAjaran::latest()->first();
            $jadwal = Jadwal::where('kelas_id', $siswa->kelas_id)->where('tp',$ajaran->tp)->get();
            return view('ngajar.index', compact('jadwal','tp'));
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
        if($request->get('id') == NULL){
            $kelas = $request->get('kelas_id');
            foreach($kelas as $p){
                $jadwal = new Jadwal;
                $jadwal->mapel_id = $request->get('mapel_id');
                $jadwal->guru_id = $request->get('guru_id');
                $jadwal->tp = $request->get('tp');
                $jadwal->kelas_id = $p;
                $jadwal->save();
            }
        }else{
            $jadwal = Jadwal::find($request->get('id'));
            $jadwal->mapel_id = $request->get('mapel_idE');
            $jadwal->guru_id = $request->get('guru_idE');
            $jadwal->kelas_id = $request->get('kelas_idE');
            $jadwal->save();
        }
        return response()->json($jadwal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (Auth::user()->hasRole('Guru')){
            if($request->get('filter')){
                $tp = Jadwal::select('tp')->where('guru_id', Auth::user()->id)->distinct('tp')->get();
                $jadwal = Jadwal::where('guru_id', Auth::user()->id)->where('tp',$request->get('tp'))->get();
                return view('ngajar.index', compact('jadwal','tp'));
            }
        }
        else if (Auth::user()->hasRole('Siswa')){  
            if($request->get('filter')){
                $siswa = Siswa::where('nis', Auth::user()->id)->first();
                $tp = Jadwal::select('tp')->where('kelas_id', $siswa->kelas_id)->distinct('tp')->get();
                $jadwal = Jadwal::where('kelas_id', $siswa->kelas_id)->where('tp',$request->get('tp'))->get();
                return view('ngajar.index', compact('jadwal','tp'));
            }
        }
        else if (Auth::user()->hasRole('Ortu')){  
            if($request->get('filter')){
                $siswa = Siswa::where('user_ortu', Auth::user()->id)->first();
                $tp = Jadwal::select('tp')->where('kelas_id', $siswa->kelas_id)->distinct('tp')->get();
                $jadwal = Jadwal::where('kelas_id', $siswa->kelas_id)->where('tp',$request->get('tp'))->get();
                return view('ngajar.index', compact('jadwal','tp'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = Jadwal::find($id);
        return response()->json($jadwal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();
        return response()->json($jadwal);
    }
}
