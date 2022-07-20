@extends('layouts.main')
@section('title','Lihat Siswa')
@section('content')
<h1 class="h2">Lihat Siswa</h1>
<div class="card card-body">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="card-title">Lihat Siswa #{{$siswa->nis}}</h4>
        <hr>
      </div>
      <div class="col-lg-12 d-flex align-items-center">
        <form class="flex row">
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputNis">Nis:</label>
            <input type="text" readonly value="{{$siswa->nis}}" name="nis" class="form-control" id="inputNis" placeholder="Masukan nis">
          </div>
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputNama">Nama :</label>
            <input type="text" readonly class="form-control" value="{{$siswa->nama}}" name="nama" id="inputNama" placeholder="Masukan nama">
          </div>
          
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputJenisKelamin">Jenis Kelamin :</label>
            <select class="form-control" name="jenis_kelamin" id="inputJenisKelamin" readonly>
              <option>Pilih jenis kelamin</option>
              <option {{$siswa->jenis_kelamin  == "L" ? 'selected' :''}}  value="L">Laki-laki</option>
              <option {{$siswa->jenis_kelamin  == "P" ? 'selected' :''}} value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputNama">Admin :</label>
            <input type="text" readonly class="form-control" value="{{$siswa->admin->username}}">
          </div>
          <div class="col-12">
            {{-- Kembali --}}
            <a href="{{route('admin.siswa.index')}}" class="btn btn-primary">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection