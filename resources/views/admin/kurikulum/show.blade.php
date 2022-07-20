@extends('layouts.main')
@section('title','Lihat Kurikulum')
@section('content')
<h1 class="h2">Lihat Kurikulum</h1>
<div class="card card-body">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="card-title">Lihat Kurikulum #{{$kurikulum->id_kurikulum}}</h4>
        <hr>
      </div>
      <div class="col-lg-12 d-flex align-items-center">
        <form class="flex row">
          @csrf
        <div class="form-group col-lg-12">
            <label class="form-label" for="inputNama">Nama </label>
            <input type="text" readonly value="{{$kurikulum->nama}}" class="form-control" name="nama" id="inputNama">
        </div>
        <div class="form-group col-12">
           <label for="" class="form-label" for="inputAdmin">Admin</label>
            <input type="text" readonly value="{{$kurikulum->admin->username}}" class="form-control" name="username" id="inputAdmin">
        </div>
    
        <div class="col-12">
          <a href="{{route('admin.kurikulum.index')}}" class="btn btn-primary">Kembali</a>
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection