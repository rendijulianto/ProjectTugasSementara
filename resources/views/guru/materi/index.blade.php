@extends('layouts.main')
@section('title','Materi Kelas')
@section('content')
<h1 class="h2">Daftar Materi</h1>
<div class="card border-left-3 border-left-danger card-2by1">
    <div class="card-body">
      <div class="media align-items-center">
        <div class="media-body">
          <p>Daftar Materi</p>
          <p>Kelas : {{$kelas->kelas->nama}}</p>
        </div>
        <div class="media-right">
          <a href="{{route('guru.materi.create', ['id_jadwal' => $kelas->id_jadwal])}}" class="btn btn-success float-right">
            <i class="fa fa-plus"> </i> Tambah Materi
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
         @forelse ($materi as $mt)
         
             <tr>
                <td>
                    {{$mt->judul}}
                </td>
                <td>
                    {{$mt->tanggal_buat}}
                </td>
                <td>
                    {{$mt->tanggal_tutup}}
                </td>
                <td>
                    <a data-toggle="tooltip" data-placement="top" title="Lihat Materi" href="{{route('guru.materi.show', ['id_materi' => $mt->id_materi])}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-eye"></i>
                      </a>
                      {{-- Form Delete --}}
                        <form action="{{route('guru.materi.destroy', ['id_materi' => $mt->id_materi])}}" method="POST" class="d-inline" onclick="return confirm('Apakah yakin akan menghapus {{$mt->judul}} ?')">
                            @csrf
                            @method('DELETE')
                            <button data-toggle="tooltip" data-placement="top" title="Hapus Materi"  class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                            </button>
                        </form>
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