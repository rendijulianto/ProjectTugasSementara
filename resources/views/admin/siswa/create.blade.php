@extends('layouts.main')
@section('title','Siswa')
@section('content')
<h1 class="h2">Daftar Siswa</h1>
<div class="card card-body">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="card-title">Tambah Siswa</h4>
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
        <form class="flex row" method="POST" action="{{route('admin.siswa.store')}}">
            @csrf
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputNis">Nis:</label>
            <input type="text" value="{{old('nis')}}" name="nis" class="form-control" id="inputNis" placeholder="Masukan nis">
            @if ($errors->has('nis'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('nis') }}.</i>
            </small>
           @endif
          </div>
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputNama">Nama :</label>
            <input type="text" class="form-control" value="{{old('nama')}}" name="nama" id="inputNama" placeholder="Masukan nama">
            @if ($errors->has('nama'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('nama') }}.</i>
            </small>
           @endif
          </div>
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputPassword">Password :</label>
            <input type="password" class="form-control" value="{{old('password')}}" name="password" id="inputPassword" placeholder="Masukan password">
            @if ($errors->has('password'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('password') }}.</i>
            </small>
           @endif
        </div>
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputJenisKelamin">Jenis Kelamin :</label>
            <select class="form-control" name="jenis_kelamin" id="inputJenisKelamin">
              <option>Pilih jenis kelamin</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
            @if ($errors->has('jenis_kelamin'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('jenis_kelamin') }}.</i>
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