<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route Auth 
Route::get('/guru/login', 'Auth\LoginController@guru')->name('guru.login');
Route::get('/siswa/login', 'Auth\LoginController@siswa')->name('siswa.login');
Route::get('/admin/login', 'Auth\LoginController@admin')->name('admin.login');
Route::post('/guru/login', 'Auth\LoginController@guruLogin')->name('guru.login.submit');
Route::post('/siswa/login', 'Auth\LoginController@siswaLogin')->name('siswa.login.submit');
Route::post('/admin/login', 'Auth\LoginController@adminLogin')->name('admin.login.submit');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Route Group Admin with name space

Route::group(['middleware' => ['web'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::resource('siswa', 'SiswaController', ['as' => 'admin']);
    Route::resource('guru', 'GuruController', ['as' => 'admin']);
    Route::resource('kelas', 'KelasController', ['as' => 'admin']);
    Route::get('/kelasDetailMataPelajaran/{id_kelas}', 'KelasController@mataPelajaranKelas')->name('admin.kelas.mataPelajaranKelas');
    Route::get('/kelasDetailMataPelajaran/create/{id}', 'MataPelajaranKelasController@create')->name('admin.mataPelajaranKelas.create');
    Route::post('/kelasDetailMataPelajaran/create/{id}', 'MataPelajaranKelasController@store')->name('admin.mataPelajaranKelas.store');
    Route::delete('/mataPelajaranKelas/{id_kelas}/{id_mapel}', 'MataPelajaranKelasController@destroy')->name('admin.mataPelajaranKelas.destory');
    Route::resource('mataPelajaran', 'MataPelajaranController', ['as' => 'admin']);
    Route::get('/mataPelajaranDetailGuru/{mataPelajaran}', 'MataPelajaranController@mataPelajaranDetail')->name('admin.mataPelajaranDetail');
    Route::get('/mataPelajaranGuru/create/{id}', 'MataPelajaranGuruController@create')->name('admin.mataPelajaranGuru.create');
    Route::post('/mataPelajaranGuru/create/{id}', 'MataPelajaranGuruController@store')->name('admin.mataPelajaranGuru.store');
    Route::delete('/mataPelajaranGuru/{id_guru}/{id_mapel}', 'MataPelajaranGuruController@destroy')->name('admin.mataPelajaranGuru.destroy');
});



