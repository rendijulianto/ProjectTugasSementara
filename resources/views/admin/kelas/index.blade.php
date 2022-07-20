@extends('layouts.main')
@section('title','Kelas')
@section('content')
<h1 class="h2">Daftar Kelas</h1>
    
<div class="card border-left-3 border-left-danger card-2by1">
  <div class="card-body">
    <div class="media align-items-center">
      <div class="media-body">
        <p>Daftar Kelas</p>
      </div>
      <div class="media-right">
        <a
          href="{{route('admin.kelas.create')}}"
          class="btn btn-success float-right"
        >
          <i class="fa fa-plus"> </i> Tambah Kelas
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
                Cari Kelas
             </h3>
          </div>
          <div class="card-body">
             <form action="" class="row">
               <div class="col-12 col-lg-4">
                <div class="input-group">
                    <input
                   type="text"
                   class="form-control"
                   value="{{Request::get('keyword')}}"
                   name="keyword"
                   placeholder="Cari Kelas"
                   aria-label="Cari Kelas"
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
               <div class="col-12 col-lg-4">
                <div class="input-group">
                   <select class="form-control" name="tahun_ajaran" id="">
                    <option value="">Filter Tahun Ajaran</option>
                    @for($i=date('Y')+5;$i>=2020;$i--)
                      <option value="{{$i-1}}/{{$i}}">{{$i-1}}/{{$i}}</option>
                    @endfor

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
               <div class="col-12 col-lg-4">
                <div class="input-group">
                   <select class="form-control" name="jurusan" id="">
                    <option value="">Filter Jurusan</option>
                    <option value="IPA">IPA</option>
                    <option value="IPS">IPS</option>

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
        <th>Jurusan</th>
        <th>Tahun Ajaran</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="list">
        @foreach ($kelas as $kls)
       
          <tr>
            <td>{{$kls->nama}}</td>
            <td>{{$kls->jurusan}}</td>
            <td>
              {{$kls->tahun_ajaran}}
            </td>
            <td>
               <a href="{{route('admin.kelas.show', ['kela' => $kls->id_kelas])}}" class="btn btn-sm btn-primary">
                <i class="fa fa-eye"></i>
              </a>
              {{-- Form Delete --}}
              <form action="{{route('admin.kelas.destroy', ['kela' => $kls->id_kelas])}}" method="POST" class="d-inline" onclick="return confirm('Apakah yakin akan menghapus {{$kls->nama}} ?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i>
                </button>
              
            </form>
              <a  data-toggle="tooltip" data-placement="top" title="Tambah Mata Pelajaran" href="{{route('admin.kelas.mataPelajaranKelas', ['id_kelas' => $kls->id_kelas])}}" class="btn btn-sm btn-success">
                <i class="fa fa-plus-circle"></i>
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
            {{$kelas->links('vendor.pagination.bootstrap-4')}}
        </div>
       </div>
    </div>
</div>
@endsection