<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MataPelajaranKelas;
use App\Models\Siswa;
use App\Models\Guru;
class DashboardController extends Controller
{
    public function index()
    {
        $guru = Guru::find(1);
        $kelas = $guru->mataPelajaranKelas;
        
        return view('guru.dashboard.index', compact('kelas'));
    }
    
}
