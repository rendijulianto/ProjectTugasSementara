@extends('layouts.main')
@section('title','Tambah Pengajar')
@section('content')
<div class="card card-body">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="card-title">Tambah Pengajar</h4>
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
        <form class="flex row" method="POST" action="{{route('admin.mataPelajaranGuru.store', ['id' => $mapel->id_mapel])}}">
            @csrf
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputNama">Nama Mata Pelajaran:</label>
            <input type="text" value="{{$mapel->nama}}" name="nama" readonly class="form-control" id="inputNama" placeholder="Masukan nama">
          </div>
        
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputGuru">Guru :</label>
            <select class="form-control" name="id_guru" id="inputGuru">
              <option>Pilih Guru</option>
                @foreach($guru as $g)
                <option value="{{$g->id_guru}}">{{$g->nama}} ({{$g->username}})</option>
                @endforeach
            </select>
            @if ($errors->has('id_guru'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('id_guru') }}.</i>
            </small>
           @endif
          </div>
    
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              Simpan
            </button>
           
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection