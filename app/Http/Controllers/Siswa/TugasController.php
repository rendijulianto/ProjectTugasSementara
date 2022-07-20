<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Models\PengumpulanTugas;
class TugasController extends Controller
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
        $tugas = $kelas->tugas;
       
       
        return view('siswa.tugas.index', compact('tugas', 'kelas'));
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
    public function store($id_jadwal,$id_tugas,Request $request)
    {
        $this->validate($request,[
            'link' => ['url', 'required'],
        ]);
        $siswa = Siswa::find(2);
        $kelas = $siswa->kelasSiswa->kelas->mataPelajaran->where('id_jadwal', $id_jadwal)->first();
        if(!$kelas) {
               return redirect()->route('siswa.tugas.index', ['id_jadwal' => $id_jadwal]);
        }
         $tugas = $kelas->tugas->where('id_tugas', $id_tugas)->first();
         if(!$tugas) {
             return redirect()->route('siswa.tugas.index', ['id_jadwal' => $id_jadwal]);
         }
         if($tugas->tanggal_tutup < date('Y-m-d H:i:s')) {
             return redirect()->route('siswa.tugas.index', ['id_jadwal' => $id_jadwal])->with('error', 'Tugas sudah ditutup');
         }
         $cek = PengumpulanTugas::where('id_tugas', $id_tugas)->where('id_siswa', $siswa->id_siswa)->first();
         if($cek) {
             return redirect()->route('siswa.tugas.index', ['id_jadwal' => $id_jadwal])->with('error', 'Tugas sudah pernah di submit');
         }
         PengumpulanTugas::create([
                'id_siswa' => $siswa->id_siswa,
                'link' => $request->link,
               ' id_tugas' => $id_tugas,
            ]);
         return redirect()->route('siswa.tugas.index', ['id_jadwal' => $id_jadwal])->with('success', 'Tugas berhasil di submit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_jadwal,$id_tugas)
    {
       $siswa = Siswa::find(2);
       $kelas = $siswa->kelasSiswa->kelas->mataPelajaran->where('id_jadwal', $id_jadwal)->first();
       if(!$kelas) {
              return redirect()->route('siswa.tugas.index', ['id_jadwal' => $id_jadwal]);
       }
        $tugas = $kelas->tugas->where('id_tugas', $id_tugas)->first();
        if(!$tugas) {
            return redirect()->route('siswa.tugas.index', ['id_jadwal' => $id_jadwal]);
        }
        return view('siswa.tugas.show', compact('tugas', 'kelas'));
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
