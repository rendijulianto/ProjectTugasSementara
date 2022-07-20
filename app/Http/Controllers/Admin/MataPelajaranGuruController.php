<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\MataPelajaran;
use App\Models\MataPelajaranGuru;
use App\Http\Requests\MataPelajaranGuruRequest;

class MataPelajaranGuruController extends Controller
{
   
    public function create($id) {
        $mapel = MataPelajaran::findOrFail($id);
        if(!$mapel) {
            return redirect()->route('admin.mataPelajaran.index')->with('error', 'Data tidak ditemukan');
        }
        $guru = Guru::orderby('nama', 'asc')->get();
        return view('admin.mataPelajaranGuru.create', compact('mapel', 'guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MataPelajaranGuruRequest $request, $id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        if(!$mapel) {
            return redirect()->route('admin.mataPelajaran.index')->with('error', 'Data tidak ditemukan');
        }
        $request->merge(['id_mapel' => $id]);
        $cek = MataPelajaranGuru::where('id_mapel', $id)->where('id_guru', $request->id_guru)->first();
        if($cek) {
            return redirect()->route('admin.mataPelajaranDetail', ['mataPelajaran' => $mapel->id_mapel])->with('error', 'Data sudah ada');
        }
        $mapelGuru = MataPelajaranGuru::create($request->all());
        return redirect()->route('admin.mataPelajaranDetail', ['mataPelajaran' => $mapel->id_mapel])->with('success', 'Data berhasil ditambahkan');
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
    public function destroy($id_guru, $id_mapel) 
    {
        $mapel = MataPelajaranGuru::where('id_guru', $id_guru)->where('id_mapel', $id_mapel)->first();
        if(!$mapel) {
            return redirect()->route('admin.mataPelajaranDetail', ['mataPelajaran' => $id_mapel])->with('error', 'Data tidak ditemukan');
        }
        DB::delete('delete from mata_pelajaran_guru where id_guru = ? and id_mapel = ?', [$id_guru, $id_mapel]);
        return redirect()->route('admin.mataPelajaran.index')->with('success', 'Data berhasil dihapus');  
    }
}
