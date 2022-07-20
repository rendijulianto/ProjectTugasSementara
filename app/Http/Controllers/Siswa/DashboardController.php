<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::find(2);
        $mapel = $siswa->kelasSiswa->kelas->mataPelajaran;
        return view('siswa.dashboard.index', compact('siswa', 'mapel'));
    }
}
