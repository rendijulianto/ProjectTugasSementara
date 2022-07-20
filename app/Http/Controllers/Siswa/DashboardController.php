<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Auth;
class DashboardController extends Controller
{
    public function index()
    {
       
        $siswa = Auth::guard('siswa')->user();
        if($siswa->kelasSiswa ==null) {
            $mapel = array();
        } else {
            $mapel = $siswa->kelasSiswa->kelas->mataPelajaran;
        }
       
        return view('siswa.dashboard.index', compact('siswa', 'mapel'));
    }
}
