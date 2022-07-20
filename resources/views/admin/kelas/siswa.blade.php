@extends('layouts.main')
@section('title','Kelas Siswa ')
@section('content')
<h1 class="h2">Daftar Kelas Siswa </h1>
<div class="card border-left-3 border-left-danger card-2by1">
    <div class="card-body">
      <div class="media align-items-center">
        <div class="media-body">
          <p>Daftar Kelas Siswa </p>
           <b>
            {{$kelas->nama}} - {{$kelas->tahun_ajaran}}
           </b>
        </div>
        <div class="media-right">
          <a href="{{route('admin.kelasSiswa.create', ['id' => $kelas->id_kelas])}}" class="btn btn-success float-right">
            <i class="fa fa-user-plus"> </i>  Siswa
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
        <th>Nis</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="list">
        @foreach ($kelas->daftarSiswa()->get() as $sw)
       
      <tr>
        <td>
            {{$sw->siswa->nis}}
        </td>
        <td>
            {{$sw->siswa->nama}}
        </td>
        <td>
            <form action="{{route('admin.kelasSiswa.destory', ['id_kelas' => $kelas->id_kelas, 'id_siswa' => $sw->id_siswa])}}" method="POST" class="d-inline" onclick="return confirm('Apakah yakin akan menghapus {{$sw->siswa->nama}} ?')">
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