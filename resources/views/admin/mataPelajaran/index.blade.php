@extends('layouts.main')
@section('title','Mata Pelajaran')
@section('content')
<h1 class="h2">Daftar Mata Pelajaran</h1>
    
<div class="card border-left-3 border-left-danger card-2by1">
  <div class="card-body">
    <div class="media align-items-center">
      <div class="media-body">
        <p>Daftar Mata Pelajaran</p>
      </div>
      <div class="media-right">
        <a
          href="{{route('admin.mataPelajaran.create')}}"
          class="btn btn-success float-right"
        >
          <i class="fa fa-plus"> </i> Tambah Mata Pelajaran
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

<div class="row">
    <div class="col-12">
       {{-- Search With Icon And Button --}}
         <div class="card">
          <div class="card-header">
             <h3 class="card-title">
                <i class="fa fa-search"></i>
                Cari Mata Pelajaran
             </h3>
          </div>
          <div class="card-body">
             <form action="" class="row">
               <div class="col-12 col-lg-6">
                <div class="input-group">
                    <input
                   type="text"
                   class="form-control"
                   value="{{Request::get('keyword')}}"
                   name="keyword"
                   placeholder="Cari Mata Pelajaran"
                   aria-label="Cari Mata Pelajaran"
                   aria-describedby="button-addon2"
                    />
                    <div class="input-group-append">
                   <button
                      class="btn btn-primary"
                      type="submit"
                      id="button-addon2"
                   >
                      <i class="fa fa-search"></i>
                   </button>
                    </div>
                  </div>

               </div>
               <div class="col-12 col-lg-6">
                <div class="input-group">
                   <select class="form-control" name="id_kurikulum" id="">
                    <option value="">Filter Kurikulum</option>
                     @foreach ($kurikulum as $k)
                        <option value="{{$k->id_kurikulum}}">{{$k->nama}}</option>
                     @endforeach

                   </select>
                    <div class="input-group-append">
                   <button
                      class="btn btn-primary"
                      type="submit"
                      id="button-addon2"
                   >
                      <i class="fa fa-search"></i>
                   </button>
                    </div>
                  </div>
                  
               </div>
             </form>
          </div>
        </div>
    </div>
</div>

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
        <th>Kurikulum</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="list">
        @foreach ($mataPelajaran as $mp)
          <tr>
            <td>{{$mp->nama}}</td>
            <td>{{$mp->kurikulum->nama}}</td>
            <td>
              <a data-toggle="tooltip" data-placement="top" title="Lihat Mata Pelajaran" href="{{route('admin.mataPelajaran.show', ['mataPelajaran' => $mp->id_mapel])}}" class="btn btn-sm btn-primary">
                <i class="fa fa-eye"></i>
              </a>
              {{-- Form Delete --}}
                <form action="{{route('admin.mataPelajaran.destroy', ['mataPelajaran' => $mp->id_mapel])}}" method="POST" class="d-inline" onclick="return confirm('Apakah yakin akan menghapus {{$mp->nama}} ?')">
                    @csrf
                    @method('DELETE')
                    <button data-toggle="tooltip" data-placement="top" title="Hapus Mata Pelajaran"  class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i>
                    </button>
                </form>
                <a  data-toggle="tooltip" data-placement="top" title="Tambah Pengajar" href="{{route('admin.mataPelajaranDetail', ['mataPelajaran' => $mp->id_mapel])}}" class="btn btn-sm btn-success">
                  <i class="fa fa-user-plus"></i>
                 </a>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  
</div>
<div class="row">
    <div class="col-12">
       <div class="card">
        <div class="card-body">
            {{$mataPelajaran->links('vendor.pagination.bootstrap-4')}}
        </div>
       </div>
    </div>
</div>
@endsection