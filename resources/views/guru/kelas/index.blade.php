@extends('layouts.main')
@section('title','Daftar Siswa')
@section('content')
<h1 class="h2">Daftar Siswa</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                {{-- Info Total --}}
                <div class="media align-items-center">
                    <div class="media-body">
                        <p>Total Siswa</p>
                        <h3 class="text-danger">{{number_format($kelas->kelas->daftarSiswa->count())}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                {{-- Info Total --}}
                <div class="media align-items-center">
                    <div class="media-body">
                        <p>Total Materi</p>
                  
                        <h3 class="text-danger">{{number_format($materi->count())}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                {{-- Info Total --}}
                <div class="media align-items-center">
                    <div class="media-body">
                        <p>Total Tugas</p>
                        <h3 class="text-danger">{{number_format($tugas->count())}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<div class="card border-left-3 border-left-danger card-2by1">
  <div class="card-body">
    <div class="media align-items-center">
      <div class="media-body">
        <p>Daftar Siswa</p>
        <p>{{$kelas->kelas->nama}} | {{$kelas->kelas->jurusan}}</p>
      </div>
      <div class="media-right m-2">
        <a
          href="{{route('guru.tugas.index', ['id_jadwal' => $kelas->id_jadwal])}}"
          class="btn btn-primary float-right" style="margin-left: 10px"
        >
          <i class="fa fa-plus"> </i>  Tugas
        </a>
        <a
          href="{{route('guru.materi.index', ['id_jadwal' => $kelas->id_jadwal])}}"
          class="btn btn-success float-right"
        >
          <i class="fa fa-plus"> </i>  Materi
        </a>
      </div>
    </div>
  </div>
</div>
{{-- If Flash Success --}}
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> {{Session::get('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
{{-- If Flash Error --}}    
@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> {{Session::get('error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif



<div
  class="card table-responsive"
  data-toggle="lists"
  data-lists-sort-by="js-lists-values-document"
  data-lists-sort-desc="true"
>
  <table class="table mb-0">
    <thead class="thead-light">
      <tr>
        <th>Nama</th>
        <th>Nis</th>
      </tr>
    </thead>
    <tbody class="list">
        @forelse ($kelas->kelas->daftarSiswa as $kls)
          <tr>
            <td>
                {{$kls->siswa->nama}}
            </td>
            <td>
                {{$kls->siswa->nis}}
            </td>
          </tr>
        @empty
        <tr>
            <td>
                Belum ada siswa
            </td>
        </tr>
        @endempty
    </tbody>
  </table>
</div>
@endsection