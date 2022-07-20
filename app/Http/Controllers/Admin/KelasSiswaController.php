<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Http\Requests\KelasSiswaRequest;
use App\Models\KelasSiswa;
use DB;
class KelasSiswaController extends Controller
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
            return redirect()->route('admin.kelas.kelasSiswa')->with('error', 'Data tidak ditemukan');
        }
        $siswa = Siswa::orderby('nis', 'desc')->get();
        return view('admin.kelasSiswa.create', compact('kelas', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KelasSiswaRequest $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        if(!$kelas) {
            return redirect()->route('admin.kelas.index')->with('error', 'Data tidak ditemukan');
        }
        $request->merge(['id_kelas' => $id]);
        $cek = KelasSiswa::where('id_kelas', $id)->where('id_siswa', $request->id_siswa)->first();
        if($cek) {
            return redirect()->route('admin.kelas.kelasSiswa', ['id_kelas' => $kelas->id_kelas])->with('error', 'Data sudah ada');
        }
        $kelasSiswa = KelasSiswa::create($request->all());
        return redirect()->route('admin.kelas.kelasSiswa', ['id_kelas' => $kelas->id_kelas])->with('success', 'Data berhasil ditambahkan');
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
    public function destroy($id_kelas, $id_siswa) 
    {
        $kelas = KelasSiswa::where('id_siswa', $id_siswa)->where('id_kelas', $id_kelas)->first();
        if(!$kelas) {
            return redirect()->route('admin.kelas.kelasSiswa', ['id_kelas' => $id_kelas])->with('error', 'Data tidak ditemukan');
        }
        DB::delete('delete from kelas_siswa where id_siswa = ? and id_kelas = ?', [$id_siswa, $id_kelas]);
        return redirect()->route('admin.kelas.kelasSiswa', ['id_kelas' => $id_kelas])->with('success', 'Data berhasil dihapus');  
    }
}
