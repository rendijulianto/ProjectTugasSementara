@extends('layouts.main')
@section('title','Lihat Guru')
@section('content')
<h1 class="h2">Lihat Guru</h1>
<div class="card card-body">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="card-title">Lihat Guru #{{$guru->id_guru}}</h4>
        <hr>
      </div>
      <div class="col-lg-12 d-flex align-items-center">
        <form class="flex row">
          @csrf
        <div class="form-group col-lg-6">
            <label class="form-label" for="inputNIPNama">NIP</label>
            <input type="text" readonly value="{{$guru->nip}}" class="form-control" name="nip" id="inputNIP" placeholder="Masukan NIP (Jika Ada)">
           
        </div>
        <div class="form-group col-lg-6">
          <label class="form-label" for="inputNamaLengkap">Nama Lengkap:</label>
          <input type="text" readonly class="form-control"  value="{{$guru->nama}}" name="nama" id="inputNama" placeholder="Masukan Nama Lengkap">
          
      </div>
        <div class="form-group col-lg-6">
          <label class="form-label" for="inputUsername">Username:</label>
          <input type="text" readonly  class="form-control"  value="{{$guru->username}}" name="username" id="inputUsername" placeholder="Masukan Username">
         
      </div>
      
    <div class="form-group col-lg-12">
      <label class="form-label" for="inputAlamat">Alamat:</label>
      <textarea name="alamat" readonly placeholder="Masukan Alamat" class="form-control" id="inputAlamat" cols="30" rows="5">{{$guru->alamat}}</textarea>
  </div>
        <div class="col-12">
          <a href="{{route('admin.guru.index')}}" class="btn btn-primary">Kembali</a>
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection