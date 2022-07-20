@extends('layouts.main')
@section('title','Tambah Kurikulum')
@section('content')
<h1 class="h2">Daftar Kurikulum</h1>
<div class="card card-body">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="card-title">Tambah Kurikulum</h4>
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
        <form class="flex row" method="POST" action="{{route('admin.kurikulum.store')}}">
        @csrf
          <div class="form-group col-lg-12">
              <label class="form-label" for="inputNama">Nama</label>
              <input type="text" value="{{old('nama')}}" class="form-control" name="nama" id="nama" placeholder="Nama Kurikulum">
             @if ($errors->has('nama'))
              <small class="invalid feedback text-danger"role="alert">
                  <i>*{{ $errors->first('nama') }}.</i>
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