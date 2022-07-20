@extends('layouts.main')
@section('title','Lihat Mata Pelajaran')
@section('content')
<h1 class="h2">Lihat Mata Pelajaran</h1>
<div class="card card-body">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="card-title">Lihat Mata Pelajaran #{{$mataPelajaran->id_mapel}}</h4>
        <hr>
      </div>
      <div class="col-lg-12 d-flex align-items-center">
        <form class="flex row">
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputNama">Mata Pelajaran:</label>
            <input type="text" readonly value="{{$mataPelajaran->nama}}" name="nama" class="form-control" id="inputNama">
          </div>
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputKurikulum">Kurikulum :</label>
            <input type="text" readonly class="form-control" value="{{$mataPelajaran->kurikulum->nama}}" name="kurikulum" id="inputKurikulum">
          </div>
          <div class="col-12">
            {{-- Kembali --}}
            <a href="{{route('admin.mataPelajaran.index')}}" class="btn btn-primary">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection