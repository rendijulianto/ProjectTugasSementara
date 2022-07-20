@extends('layouts.main')
@section('title','Mata Pelajaran')
@section('content')
    
<div class="card border-left-3 border-left-danger card-2by1">
  <div class="card-body">
    <div class="media align-items-center">
      <div class="media-body">
        <p>Daftar Guru Mata Pelajaran</p>
        <p>
          {{$mataPelajaran->nama}}
        </p>
      </div>
      <div class="media-right">
        <a
        href="{{route('admin.mataPelajaranGuru.create', ['id' => $mataPelajaran->id_mapel])}}"
          
          class="btn btn-success float-right"
        >
          <i class="fa fa-plus"> </i> Tambah Pengajar
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
        <th>Mapel</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="list">
        @foreach ($mataPelajaran->guru as $dt)
          <tr>
            <td>{{$dt->guru->nama}}</td>
            <td>{{$dt->mapel->nama}}</td>
            <td>
              <form action="{{route('admin.mataPelajaranGuru.destroy', ['id_guru' => $dt->id_guru,'id_mapel' => $dt->id_mapel])}}" method="POST" class="d-inline" onclick="return confirm('Apakah yakin akan menghapus {{$dt->guru->nama}} ?')">
                @csrf
                @method('DELETE')
                <button data-toggle="tooltip" data-placement="top" title="Hapus Pengajar"  class="btn btn-sm btn-danger">
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