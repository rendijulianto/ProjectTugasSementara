@extends('layouts.main')
@section('title','Tugas Kelas')
@section('content')
<h1 class="h2">Daftar Tugas</h1>
<div class="card border-left-3 border-left-danger card-2by1">
    <div class="card-body">
      <div class="media align-items-center">
        <div class="media-body">
          <p>Daftar Tugas</p>
          <p>Kelas : {{$kelas->kelas->nama}}</p>
        </div>
      </div>
    </div>
  </div>
{{-- If Flash Error --}}    
@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> {{Session::get('error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
  <div class="card table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-document" data-lists-sort-desc="true">
    <table class="table mb-0">
      <thead class="thead-light">
        <tr>
          <th>Judul</th>
          <th>Tanggal Ditutup</th>
          <th>Tanggal Dibuat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="list">
         @forelse ($tugas as $tg)
        
             <tr>
                <td>
                    {{$tg->judul}}
                </td>
                <td>
                    {{$tg->tanggal_buat}}
                </td>
                <td>
                    {{$tg->tanggal_tutup}}
                </td>
                <td>
                    <a href="{{route('siswa.tugas.show', ['id_jadwal' => $tg->id_jadwal, 'id_tugas' => $tg->id_tugas])}}" class="btn btn-primary btn-sm">
                     <i class="fa fa-book-open mr-2"></i> Baca Sekarang
                    </a>
                </td>
             </tr>
         @empty
             <tr>
                    <td colspan="4">
                        <p>
                            Tidak ada data
                        </p>
                    </td>
             </tr>
         @endforelse
      </tbody>
    </table>
  </div>
@endsection