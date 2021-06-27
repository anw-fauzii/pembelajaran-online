<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Siswa::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit"><i class="metismenu-icon pe-7s-pen"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="metismenu-icon pe-7s-trash"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('siswa.index');
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
        if($request->nis_old != NULL){
            $user_siswa = User::find($request->nis_old);
            $user_siswa->id = $request->nis;
            $user_siswa->password = Hash::make("12345678");
            $user_siswa->save();
            $user_ortu = User::find("99$request->nis_old");
            $user_ortu->id = "99$request->nis";
            $user_ortu->password = Hash::make("12345678");
            $user_ortu->save();
        }else{
            $user_siswa = new User;
            $user_siswa->id = $request->nis;
            $user_siswa->password = Hash::make("12345678");
            $user_siswa->save();
            $user_ortu = new User;
            $user_ortu->id = "99$request->nis";
            $user_ortu->password = Hash::make("12345678");
            $user_ortu->save();
        }
        $siswa = Siswa::updateOrCreate(
            ['id' => $request->id],
            [
                'nis' => $request->nis,
                'nama' => $request->nama,
                'jk' => $request->jk,
                'user_ortu' => "99$request->nis",
                'ortu' => $request->ortu,
                'kontak' => $request->kontak
            ]
        );
        return response()->json($siswa);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return response()->json($siswa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $user_siswa = User::find($siswa->nis);
        $user_ortu = User::find($siswa->user_ortu);
        $user_ortu->delete();
        $user_siswa->delete();
        $siswa->delete();
        return response()->json($siswa);
    }
}
