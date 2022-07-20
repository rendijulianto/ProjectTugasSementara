<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\KelasSiswa;
use App\Models\Materi;
use App\Models\MataPelajaranKelas;
use App\Http\Requests\MateriRequest;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $guru = Guru::find(1);
        $kelas = $guru->mataPelajaranKelas->where('id_jadwal', $id)->first();
        if(!$kelas) {
            return redirect()->route('guru.dashboard.index');
        }
        $materi = $kelas->materi;
       
        return view('guru.materi.index', compact('materi', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_jadwal)
    {
        $guru = Guru::find(1);
        $kelas = $guru->mataPelajaranKelas->where('id_jadwal', $id_jadwal)->first();
        if(!$kelas) {
            return redirect()->route('guru.dashboard.index');
        }
        return view('guru.materi.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriRequest $request, $id_jadwal)
    {
       $jadwal = MataPelajaranKelas::find($id_jadwal);
       if(!$jadwal) {
           return redirect()->route('guru.dashboard.index')->with('error', 'Data tidak ditemukan');
       }
       $request->merge(['id_jadwal' => $jadwal->id_jadwal]);

        $tanggal_tutup = date('Y-m-d H:i:00', strtotime($request->tanggal_tutup));
        $request->merge(['tanggal_tutup' => $tanggal_tutup]);
        $request->merge(['tanggal_buat' => date('Y-m-d H:i:00')]);
       
       $mataPelajaran = Materi::create($request->all());
       return redirect()->route('guru.materi.index', $id_jadwal)->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materi = Materi::findOrFail($id);

        if(!$materi) {
            return redirect()->route('guru.dashboard.index')->with('error', 'Data tidak ditemukan');
        }
        return view('guru.materi.show', compact('materi'));
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
    public function destroy($id_materi)
    {
        $materi = Materi::findOrFail($id_materi);
        $id_jadwal = $materi->id_jadwal;
        $materi->delete();
        return redirect()->route('guru.materi.index', ['id_jadwal' => $id_jadwal])->with('success', 'Data berhasil dihapus');  
    }
}
