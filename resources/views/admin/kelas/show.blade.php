@extends('layouts.main')
@section('title','Lihat Kelas')
@section('content')
<h1 class="h2">Lihat Kelas</h1>
<div class="card card-body">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="card-title">Lihat Kelas #{{$kelas->nama}}</h4>
        <hr>
      </div>
      <div class="col-lg-12 d-flex align-items-center">
        <form class="flex row">

        <div class="form-group col-lg-6">
          <label class="form-label" for="inputNama">Nama:</label>
          <input type="text" readonly value="{{$kelas->nama}}" name="nama" class="form-control" id="inputNama" placeholder="Masukan nama">
         
        </div>
      
        <div class="form-group col-lg-6">
          <label class="form-label" for="inputJurusan">Jurusan :</label>
          <select class="form-control" readonly name="jurusan" id="inputJurusan">
            <option>Pilih Jurusan</option>
            <option {{$kelas->jurusan == "IPA" ? 'selected' : ''}}  value="IPA">IPA</option>
            <option {{$kelas->jurusan == "IPS" ? 'selected' : ''}} value="IPS">IPS</option>
          </select>
        </div>
        <div class="form-group col-lg-12">
          <label class="form-label" for="inputTahunAjaran">Tahun Ajaran :</label>
          <select class="form-control" readonly name="tahun_ajaran" id="inputTahunAjaran">
            <option>Pilih Tahun Ajaran</option>
            @for($i=date('Y')+5;$i>=2020;$i--)
            <option {{$i == $kelas->tahun_ajaran  ? 'selected' : ''}} value="{{$i-1}}/{{$i}}">{{$i-1}}/{{$i}}</option>
            @endfor
          </select>
         
        </div>
        <div class="col-12">
            <a href="{{route('admin.kelas.index')}}" class="btn btn-primary">Kembali</a>
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection