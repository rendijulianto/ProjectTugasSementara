@extends('layouts.main')
@section('title','Mata Pelajaran')
@section('content')

<div class="card card-body">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="card-title">Tambah Materi</h4>
        <hr>
      </div>
      
      <div class="col-lg-12 d-flex align-items-center">
        <form class="flex row" method="POST" action="{{route('guru.materi.store', ['id_jadwal' => $kelas->id_jadwal])}}">
           @csrf
          <div class="form-group col-lg-12">
            <label class="form-label" for="inputJudul">Judul:</label>
            <input type="text" class="form-control" value="{{old('judul')}}" id="inputJudul" name="judul" placeholder="Masukan Judul Materi">
            @if ($errors->has('judul'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('judul') }}.</i>
            </small>
           @endif
        </div>
          <div class="form-group col-lg-12">
            <label class="form-label" for="exampleInputEmail1">Tanggal ditutup:</label>
            <input type="datetime-local"  value="{{old('tanggal_tutup')}}" name="tanggal_tutup" class="form-control">
            @if ($errors->has('tanggal_tutup'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('tanggal_tutup') }}.</i>
            </small>
           @endif
          </div>
          <div class="form-group col-lg-12">
            <label class="form-label" for="konten">Materi / Konten:</label>
            <textarea class="form-control" placeholder="Masukan materi" rows="10"  id="konten" name="konten">{{old('konten')}}</textarea>
         
            @if ($errors->has('konten'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('konten') }}.</i>
            </small>
           @endif
          </div>
       
         
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              Simpan
            </button>
            <button type="submit" class="btn btn-danger">
              Reset
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- Quill -->

<script>
$(document).ready(function() {
  $('#summernote').summernote();
});
</script>
@endsection