@extends('layouts.main')
@section('title','Kelas Mata Pelajaran ')
@section('content')
<h1 class="h2">Daftar Kelas Mata Pelajaran </h1>
<div class="card border-left-3 border-left-danger card-2by1">
    <div class="card-body">
      <div class="media align-items-center">
        <div class="media-body">
          <p>Daftar Mata Pelajaran Kelas Mata Pelajaran </p>
           <b>
            {{$kelas->nama}} - {{$kelas->tahun_ajaran}}
           </b>
        </div>
        <div class="media-right">
          <a href="{{route('admin.mataPelajaranKelas.create', ['id' => $kelas->id_kelas])}}" class="btn btn-success float-right">
            <i class="fa fa-plus"> </i> Tambah Mata Pelajaran
            Kelas Mata Pelajaran 
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
        <th>Mata Pelajaran</th>
        <th>Guru</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="list">
        @foreach ($kelas->mataPelajaran()->get() as $mp)
      <tr>
        <td>
            {{$mp->mapel->nama}}
        </td>
        <td>
            {{$mp->guru->nama}}
        </td>
        <td>
            <form action="{{route('admin.mataPelajaranKelas.destory', ['id_kelas' => $kelas->id_kelas, 'id_mapel' => $mp->id_mapel])}}" method="POST" class="d-inline" onclick="return confirm('Apakah yakin akan menghapus {{$mp->mapel->nama}} ?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i>
                </button>
              
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
  </table>
  
</div>
@endsection