@extends('layouts.main')
@section('title','Mata Pelajaran')
@section('content')
<h1 class="h2">Daftar Mata Pelajaran</h1>
<div class="card card-body">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="card-title">Tambah Mata Pelajaran</h4>
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
        <form class="flex row" method="POST" action="{{route('admin.mataPelajaran.store')}}">
            @csrf
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputNama">Nama:</label>
            <input type="text" value="{{old('nama')}}" name="nama" class="form-control" id="inputNama" placeholder="Masukan Nama">
            @if ($errors->has('nama'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('nama') }}.</i>
            </small>
           @endif
          </div>
          
         
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputKurikulum">Kurikulum :</label>
            <select class="form-control" name="id_kurikulum" id="inputKurikulum">
              <option>Pilih Kurikulum</option>
              @foreach($kurikulum as $k)
              <option value="{{$k->id_kurikulum}}">{{$k->nama}}</option>
              @endforeach
            </select>
            @if ($errors->has('id_kurikulum'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('id_kurikulum') }}.</i>
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