@extends('layouts.main')
@section('title','Dashboard Siswa')
@section('content')
<div class="media align-items-center mb-headings">
    <div class="media-body">
      <h1 class="h2">Dashboard </h1>
    </div>
</div>
<div class="card-columns">
  @forelse ($mapel as $mp)
  <div class="card card-sm">
    <div class="card-body media">
      <div class="media-left">
        <a href="/" class="avatar avatar-lg avatar-4by3">
          <img src="{{asset('assets/images/mapel.png')}}" alt="Card image cap" class="avatar-img rounded">
        </a>
      </div>
      <div class="media-body">
        <h4 class="card-title mb-0">
          <a href="">{{$mp->mapel->nama}}</a>
        </h4>
        <small class="text-muted">
          {{$mp->guru->nama}}
        </small>
      </div>
    </div>
    <div class="card-footer text-center">
      <a href="" class="btn btn-white btn-sm float-left"><i class="material-icons btn__icon--left">playlist_add_check</i>
        Materi 
      <a href="{{route('siswa.tugas.index', ['id_jadwal'=> $mp->id_jadwal])}}" class="btn btn-white btn-sm float-right"><i class="material-icons btn__icon--left">playlist_add_check</i>
        Tugas <span class="badge badge-dark ml-2">{{number_format($mp->tugas()->whereDate('tanggal_tutup', '>=', Carbon\Carbon::now())->count())}}</span></a>
      <div class="clearfix"></div>
    </div>
  </div>
  @empty
      <p>
        Tidak ada data
      </p>
  @endforelse


</div>
 
@endsection