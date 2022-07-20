@extends('layouts.main')
@section('title','Dashboard Guru')
@section('content')
<div class="media align-items-center mb-headings">
    <div class="media-body">
      <h1 class="h2">Dashboard </h1>
    </div>
</div>
<div class="card-columns">
  @forelse ($kelas as $kls)
  <div class="card card-sm">
    <div class="card-body media">
      <div class="media-left">
        <a href="{{route('siswa.kelas.index', ['id_jadwal' => $kls->id_jadwal])}}" class="avatar avatar-lg avatar-4by3">
          <img src="{{asset('assets/images/mapel.png')}}" alt="Card image cap" class="avatar-img rounded">
        </a>
      </div>
      <div class="media-body">
        <h4 class="card-title mb-0">
          <a href="{{route('siswa.kelas.index', ['id_jadwal' => $kls->id_jadwal])}}"> {{$kls->mapel->nama}} </a>
        </h4>
        <small class="text-muted">
           {{$kls->kelas->nama}}
        </small>
      </div>
    </div>
    <div class="card-footer text-center">
      <a href="{{route('siswa.materi.index', ['id_jadwal' => $kls->id_jadwal])}}" class="btn btn-white btn-sm float-left"><i class="material-icons btn__icon--left">playlist_add_check</i>
        Materi <span class="badge badge-dark ml-2">
          {{$kls->materi->count()}}
        </span></a>
      <a href="{{route('siswa.tugas.index', ['id_jadwal' => $kls->id_jadwal])}}" class="btn btn-white btn-sm float-right"><i class="material-icons btn__icon--left">playlist_add_check</i>
        Tugas <span class="badge badge-dark ml-2">
          {{$kls->tugas->count()}}
        </span></a>

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