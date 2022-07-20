<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
class KelasController extends Controller
{
    public function index($id_jadwal)
    {
        $guru = Guru::find(1);
        $kelas = $guru->mataPelajaranKelas->where('id_jadwal', $id_jadwal)->first();
      
        if(!$kelas) {
            return redirect()->route('guru.dashboard.index');
        }
        $materi = $kelas->materi;
        $tugas = $kelas->tugas;
       
        return view('guru.kelas.index', compact('materi', 'kelas','tugas'));
    }
}
