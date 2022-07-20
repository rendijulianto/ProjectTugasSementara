@extends('layouts.main')
@section('title','Kelas')
@section('content')
<h1 class="h2">Daftar Kelas</h1>
<div class="card card-body">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="card-title">Tambah Kelas</h4>
        <hr>
      </div>
      @if(Session::has('error'))
<div class="col-lg-12"><div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> {{Session::get('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div></div>
@endif

      <div class="col-lg-12 d-flex align-items-center">
        <form class="flex row" method="POST" action="{{route('admin.kelas.store')}}">
            @csrf
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputNama">Nama:</label>
            <input type="text" value="{{old('nama')}}" name="nama" class="form-control" id="inputNama" placeholder="Masukan nama">
            @if ($errors->has('nama'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('nama') }}.</i>
            </small>
           @endif
          </div>
        
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputJurusan">Jurusan :</label>
            <select class="form-control" name="jurusan" id="inputJurusan">
              <option>Pilih Jurusan</option>
              <option value="IPA">IPA</option>
              <option value="IPS">IPS</option>
            </select>
            @if ($errors->has('jurusan'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('jurusan') }}.</i>
            </small>
           @endif
          </div>
          <div class="form-group col-lg-12">
            <label class="form-label" for="inputTahunAjaran">Tahun Ajaran :</label>
            <select class="form-control" name="tahun_ajaran" id="inputTahunAjaran">
              <option>Pilih Tahun Ajaran</option>
              @for($i=date('Y')+5;$i>=2020;$i--)
              <option value="{{$i-1}}/{{$i}}">{{$i-1}}/{{$i}}</option>
              @endfor
            </select>
            @if ($errors->has('tahun_ajaran'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('tahun_ajaran') }}.</i>
            </small>
           @endif
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              Simpan
            </button>
            <button type="reset" class="btn btn-danger">
              Reset
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection