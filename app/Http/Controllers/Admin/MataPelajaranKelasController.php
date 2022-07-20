<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MataPelajaranKelas;
use DB;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Http\Requests\MataPelajaranKelasRequest;
class MataPelajaranKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kelas = Kelas::findOrFail($id);
        if(!$kelas) {
            return redirect()->route('admin.kelas.mataPelajaranKelas', ['id_kelas' => $kelas->id_kelas])->with('error', 'Data tidak ditemukan');
        }
        
        $guru = Guru::orderby('nama', 'asc')->get();
        $mapel = MataPelajaran::orderby('id_kurikulum', 'desc')->get();
        
        return view('admin.mataPelajaranKelas.create', compact('kelas','mapel', 'guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MataPelajaranKelasRequest $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        if(!$kelas) {
            return redirect()->route('admin.kelas.index')->with('error', 'Data tidak ditemukan');
        }
        $request->merge(['id_kelas' => $id]);
       
        $cek = MataPelajaranKelas::where('id_mapel', $request->id_mapel)->where('id_kelas', $kelas->id_kelas)->first();
        if($cek) {
            return redirect()->route('admin.kelas.mataPelajaranKelas', ['id_kelas' => $kelas->id_kelas])->with('error', 'Data sudah ada');
        }
        

        $mapelGuru = MataPelajaranKelas::create($request->all());
        return redirect()->route('admin.kelas.mataPelajaranKelas', ['id_kelas' => $kelas->id_kelas])->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kelas, $id_mapel)
    {
        $kelasMapel = MataPelajaranKelas::where('id_kelas', $id_kelas)->where('id_mapel', $id_mapel)->first();
        if(!$kelasMapel) {
            return redirect()->route('admin.kelas.mataPelajaranKelas', ['id_kelas' => $kelasMapel->id_kelas])->with('error', 'Data tidak ditemukan');
        }
        DB::delete('delete from mata_pelajaran_kelas where id_kelas = ? and id_mapel = ?', [$id_kelas, $id_mapel]);
        return redirect()->route('admin.kelas.mataPelajaranKelas', ['id_kelas' => $id_kelas])->with('success', 'Data berhasil dihapus');  
    }
}
