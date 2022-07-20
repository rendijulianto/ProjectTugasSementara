<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
class LoginController extends Controller
{
    public function siswa() {
        if(Auth::guard('siswa')->check()) {
            return redirect()->route('siswa.dashboard');
        }
        return view('auth.siswa');
    }
    public function isSiswa(Request $request) {
        $this->validate($request, [
            'nis' => 'required',
            'password' => 'required',
        ]);
        if(Auth::guard('siswa')->attempt(['nis' => $request->nis, 'password' => $request->password])) {
            return redirect()->route('siswa.dashboard')->with('success', 'Selamat Datang di Learning Management System SMAN 1 MAJALAYA');
        }
        return redirect()->back()->with(['error' => 'NIS atau Password Salah!']);
    }
    
    public function guru() {
        if(Auth::guard('guru')->check()) {
            return redirect()->route('guru.dashboard');
        }
        return view('auth.guru');
    }
    public function isGuru(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        if(Auth::guard('guru')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('guru.dashboard')->with('success', 'Selamat Datang di Learning Management System SMAN 1 MAJALAYA');
        }
        return redirect()->back()->with(['error' => 'Username atau Password Salah!']);
    }

    public function admin() {
        if(Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.admin');
    }
    
    public function isAdmin(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        if(Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard')->with('success', 'Selamat Datang di Learning Management System SMAN 1 MAJALAYA');
        }
        return redirect()->back()->with(['error' => 'Username atau Password Salah!']);
    }

    
    public function logout(){
        if(Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        }
        if(Auth::guard('guru')->check()) {
            Auth::guard('guru')->logout();
        }
        if(Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        return redirect()->route('siswa.login')->with(['success' => 'Berhasil Logout!']);
    }
}
