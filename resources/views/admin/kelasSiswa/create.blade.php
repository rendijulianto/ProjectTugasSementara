@extends('layouts.main')
@section('title','Tambah Siswa')
@section('content')
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
        <form class="flex row" method="POST" action="{{route('admin.kelasSiswa.create', ['id' => $kelas->id_kelas])}}">
            @csrf
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputNama">Nama Kelas:</label>
            <input type="text" value="{{$kelas->nama}}" name="nama" readonly class="form-control" id="inputNama">
          </div>
        
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputSiswa">Siswa :</label>
            <select class="form-control" name="id_siswa" id="inputSiswa">
              <option>Pilih Siswa</option>
                @foreach($siswa as $s)
                <option value="{{$s->id_siswa}}">{{$s->nama}} ({{$s->nis}})</option>
                @endforeach
            </select>
            @if ($errors->has('id_siswa'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('id_siswa') }}.</i>
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