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
Route::get('/', 'Auth\LoginController@siswa')->name('siswa.login');
Route::post('/', 'Auth\LoginController@isSiswa')->name('isSiswa.login');
Route::get('/admin/login', 'Auth\LoginController@admin')->name('auth.admin');
Route::post('/admin/login', 'Auth\LoginController@isAdmin')->name('auth.isAdmin');
Route::get('/guru/login', 'Auth\LoginController@guru')->name('auth.guru');
Route::post('/guru/login', 'Auth\LoginController@isGuru')->name('auth.isGuru');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Route Group Admin with name space

Route::group(['middleware' => ['middleware' => 'auth:admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/laporan', 'LaporanController@index')->name('admin.laporan');
    Route::post('/laporan', 'LaporanController@setRange')->name('admin.laporan.setRange');
    Route::resource('siswa', 'SiswaController', ['as' => 'admin']);
    Route::resource('guru', 'GuruController', ['as' => 'admin']);
    Route::resource('kelas', 'KelasController', ['as' => 'admin']);
    Route::resource('kurikulum', 'KurikulumController', ['as' => 'admin']);
    Route::get('/kelasDetailMataPelajaran/{id_kelas}', 'KelasController@mataPelajaranKelas')->name('admin.kelas.mataPelajaranKelas');
    Route::get('/kelasDetailMataPelajaran/create/{id}', 'MataPelajaranKelasController@create')->name('admin.mataPelajaranKelas.create');
    Route::post('/kelasDetailMataPelajaran/create/{id}', 'MataPelajaranKelasController@store')->name('admin.mataPelajaranKelas.store');
    Route::delete('/mataPelajaranKelas/{id_kelas}/{id_mapel}', 'MataPelajaranKelasController@destroy')->name('admin.mataPelajaranKelas.destory');
  
    Route::get('/kelasSiswa/{id_kelas}', 'KelasController@kelasSiswa')->name('admin.kelas.kelasSiswa');
    Route::get('/kelasSiswa/create/{id}', 'KelasSiswaController@create')->name('admin.kelasSiswa.create');
    Route::post('/kelasSiswa/create/{id}', 'KelasSiswaController@store')->name('admin.kelasSiswa.store');
    Route::delete('/kelasSiswa/{id_kelas}/{id_siswa}', 'KelasSiswaController@destroy')->name('admin.kelasSiswa.destory');
 
    Route::resource('mataPelajaran', 'MataPelajaranController', ['as' => 'admin']);
    Route::get('/mataPelajaranDetailGuru/{mataPelajaran}', 'MataPelajaranController@mataPelajaranDetail')->name('admin.mataPelajaranDetail');
    Route::get('/mataPelajaranGuru/create/{id}', 'MataPelajaranGuruController@create')->name('admin.mataPelajaranGuru.create');
    Route::post('/mataPelajaranGuru/create/{id}', 'MataPelajaranGuruController@store')->name('admin.mataPelajaranGuru.store');
    Route::delete('/mataPelajaranGuru/{id_guru}/{id_mapel}', 'MataPelajaranGuruController@destroy')->name('admin.mataPelajaranGuru.destroy');
});

Route::group(['middleware' => ['middleware' => 'auth:guru'], 'prefix' => 'guru', 'namespace' => 'Guru'], function () {
    Route::get('/', 'DashboardController@index')->name('guru.dashboard');
    Route::get('/materi/jadwal/{id_jadwal}', 'MateriController@index')->name('guru.materi.index');
    Route::get('/materi/jadwal/{id_jadwal}/create', 'MateriController@create')->name('guru.materi.create');
    Route::post('/materi/jadwal/{id_jadwal}/create', 'MateriController@store')->name('guru.materi.store');
    Route::delete('/materi/jadwal/{id_materi}', 'MateriController@destroy')->name('guru.materi.destroy');
    Route::get('/materi/detail/{id_materi}', 'MateriController@show')->name('guru.materi.show');
    //Materi 
    Route::get('/tugas/jadwal/{id_jadwal}', 'TugasController@index')->name('guru.tugas.index');
    Route::get('/tugas/jadwal/{id_jadwal}/create', 'TugasController@create')->name('guru.tugas.create');
    Route::post('/tugas/jadwal/{id_jadwal}/create', 'TugasController@store')->name('guru.tugas.store');
    Route::delete('/tugas/jadwal/{id_tugas}', 'TugasController@destroy')->name('guru.tugas.destroy');
    Route::get('/tugas/detail/{id_tugas}', 'TugasController@show')->name('guru.tugas.show');
   //Kelas
    Route::get('/kelas/{id_jadwal}', 'KelasController@index')->name('guru.kelas.index');
});



Route::group(['middleware' => ['middleware' => 'auth:siswa'], 'prefix' => 'siswa', 'namespace' => 'Siswa'], function () {
    Route::get('/', 'DashboardController@index')->name('siswa.dashboard');
    Route::get('/tugas/{id_jadwal}', 'TugasController@index')->name('siswa.tugas.index');
    Route::get('/tugas/detail/{id_jadwal}/{id_tugas}', 'TugasController@show')->name('siswa.tugas.show');
    Route::post('/tugas/detail/{id_jadwal}/{id_tugas}', 'TugasController@store')->name('siswa.tugas.store');
    Route::get('/materi/{id_jadwal}', 'MateriController@index')->name('siswa.materi.index');
    Route::get('/materi/detail/{id_jadwal}/{id_materi}', 'MateriController@show')->name('siswa.materi.show');
});
