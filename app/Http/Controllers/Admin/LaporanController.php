<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function putPermanentEnv($key, $value)
    {
        $path = app()->environmentFilePath();
    
        $escaped = preg_quote('='.env($key), '/');
    
        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }

    public function setRange(Request $request)
    {
        try {
            $range = $request->range;
            $range = explode(' to ', $range);
            $start = $range[0];
            $end = $range[1];
            //  Set Environment
            $this->putPermanentEnv('DATE_START_REPORT', $start);
            $this->putPermanentEnv('DATE_END_REPORT', $end);
            return redirect()->route('admin.laporan')->with('success', 'Priode berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Priode tanggal tidak valid');
        }

    }
}
