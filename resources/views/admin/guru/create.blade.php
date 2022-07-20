@extends('layouts.main')
@section('title','Tambah Guru')
@section('content')
<h1 class="h2">Daftar Guru</h1>
<div class="card card-body">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="card-title">Tambah Guru</h4>
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
        <form class="flex row" method="POST" action="{{route('admin.guru.store')}}">
            @csrf
          <div class="form-group col-lg-6">
              <label class="form-label" for="inputNIPNama">NIP</label>
              <input type="text" value="{{old('nip')}}" class="form-control" name="nip" id="inputNIP" placeholder="Masukan NIP (Jika Ada)">
             @if ($errors->has('nip'))
              <small class="invalid feedback text-danger"role="alert">
                  <i>*{{ $errors->first('nip') }}.</i>
              </small>
             @endif
          </div>
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputNamaLengkap">Nama Lengkap:</label>
            <input type="text" class="form-control"  value="{{old('nama')}}" name="nama" id="inputNama" placeholder="Masukan Nama Lengkap">
            @if ($errors->has('nama'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('nama') }}.</i>
            </small>
           @endif
        </div>
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputUsername">Username:</label>
            <input type="text" class="form-control"  value="{{old('username')}}" name="username" id="inputUsername" placeholder="Masukan Username">
            @if ($errors->has('username'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('username') }}.</i>
            </small>
           @endif
        </div>
        <div class="form-group col-lg-6">
          <label class="form-label" for="inputPassword">Password:</label>
          <input type="password" class="form-control"  name="password" id="inputPassword" placeholder="Masukan Password">
          @if ($errors->has('password'))
          <small class="invalid feedback text-danger"role="alert">
              <i>*{{ $errors->first('password') }}.</i>
          </small>
         @endif
      </div>
      <div class="form-group col-lg-12">
        <label class="form-label" for="inputAlamat">Alamat:</label>
        <textarea name="alamat" placeholder="Masukan Alamat" class="form-control" id="inputAlamat" cols="30" rows="5">{{old('alamat')}}</textarea>
        @if ($errors->has('alamat'))
        <small class="invalid feedback text-danger"role="alert">
            <i>*{{ $errors->first('alamat') }}.</i>
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