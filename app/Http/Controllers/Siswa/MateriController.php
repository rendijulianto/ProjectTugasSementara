<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_jadwal)
    {
        $siswa = Siswa::find(2);
    
        $kelas = $siswa->kelasSiswa->kelas->mataPelajaran()->where('id_jadwal', $id_jadwal)->first();
        
        if(!$kelas) {
            return redirect()->route('siswa.dashboard.index');
        }
        $materi = $kelas->materi;
       
       
        return view('siswa.materi.index', compact('materi', 'kelas'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_jadwal,$id_materi)
    {
       $siswa = Siswa::find(2);
       $kelas = $siswa->kelasSiswa->kelas->mataPelajaran->where('id_jadwal', $id_jadwal)->first();
       if(!$kelas) {
              return redirect()->route('siswa.materi.index', ['id_jadwal' => $id_jadwal]);
       }
        $materi = $kelas->materi->where('id_materi', $id_materi)->first();
        if(!$materi) {
            return redirect()->route('siswa.materi.index', ['id_jadwal' => $id_jadwal]);
        }
        if($materi->tanggal_tutup < date('Y-m-d H:i:s')) {
            return redirect()->route('siswa.materi.index', ['id_jadwal' => $id_jadwal])->with('error', 'Materi sudah ditutup');
        }
        return view('siswa.materi.show', compact('materi', 'kelas'));
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
    public function destroy($id)
    {
        //
    }
}
