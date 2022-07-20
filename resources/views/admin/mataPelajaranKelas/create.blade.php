@extends('layouts.main')
@section('title','Tambah Mata Pelajaran')
@section('content')
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
        <form class="flex row" method="POST" action="{{route('admin.mataPelajaranKelas.store', ['id' => $kelas->id_kelas])}}">
            @csrf
          <div class="form-group col-lg-6">
            <label class="form-label" for="inputNama">Nama Kelas:</label>
            <input type="text" value="{{$kelas->nama}}" name="nama" readonly class="form-control" id="inputNama" placeholder="Masukan nama">
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
          <div class="form-group col-lg-12">
            <label class="form-label" for="inputMataPelajaran">Mata Pelajaran :</label>
            <select class="form-control" name="id_mapel" id="inputMataPelajaran">
              <option>Pilih Mata Pelajaran</option>
                @foreach($mapel as $mpl)
                <option value="{{$mpl->id_mapel}}">{{$mpl->nama}} ({{$mpl->kurikulum->nama}})</option>
                @endforeach
            </select>
            @if ($errors->has('id_mapel'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('id_mapel') }}.</i>
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