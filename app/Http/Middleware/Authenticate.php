<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
           if($guard == 'siswa') {
               return route('siswa.dashboard');
           } else if($guard == 'guru') {
               return route('guru.dashboard');
           } else if($guard == 'admin') {
               return route('admin.dashboard');
           }
        }
        
        return route('logout');
    }
    // {
    //     if (! $request->expectsJson()) {
    //         if(auth()->guard('siswa')->check()) {
    //             return route('siswa.dashboard');
    //         } else if(auth()->guard('guru')->check()) {
    //             return route('guru.dashboard');
    //         } else if(auth()->guard('admin')->check()) {
    //             return route('admin.dashboard');
    //         } else {
    //             return route('siswa.login');
    //         }
    //     }
    // }
}
