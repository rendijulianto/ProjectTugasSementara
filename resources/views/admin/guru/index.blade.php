@extends('layouts.main')
@section('title','Guru')
@section('content')
<h1 class="h2">Daftar Guru</h1>
    
<div class="card border-left-3 border-left-danger card-2by1">
  <div class="card-body">
    <div class="media align-items-center">
      <div class="media-body">
        <p>Daftar Guru</p>
      </div>
      <div class="media-right">
        <a
          href="{{route('admin.guru.create')}}"
          class="btn btn-success float-right"
        >
          <i class="fa fa-plus"> </i> Tambah Guru
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
                Cari Guru
             </h3>
          </div>
          <div class="card-body">
             <form action="" class="row">
               <div class="col-12">
                <div class="input-group">
                    <input
                   type="text"
                   class="form-control"
                   value="{{Request::get('keyword')}}"
                   name="keyword"
                   placeholder="Cari Guru"
                   aria-label="Cari Guru"
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
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="list">
        @foreach ($guru as $gr)
          <tr>
            <td>{{$gr->id_guru}}</td>
            <td>{{$gr->nama}}
              {!! $gr->nip != null ? '<br>NIP : '.$gr->nip : '' !!}
            </td>
            <td>
              {{$gr->alamat}}
            </td>
            <td>
              <a href="{{route('admin.guru.show', ['guru' => $gr->id_guru])}}" class="btn btn-sm btn-primary">
                <i class="fa fa-eye"></i>
              </a>
              {{-- Form Delete --}}
                <form action="{{route('admin.guru.destroy', ['guru' => $gr->id_guru])}}" method="POST" class="d-inline" onclick="return confirm('Apakah yakin akan menghapus {{$gr->nama}} ?')">
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
<div class="row">
    <div class="col-12">
       <div class="card">
        <div class="card-body">
            {{$guru->links('vendor.pagination.bootstrap-4')}}
        </div>
       </div>
    </div>
</div>
@endsection