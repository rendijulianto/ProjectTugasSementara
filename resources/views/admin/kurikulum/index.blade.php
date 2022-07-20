@extends('layouts.main')
@section('title','Kurikulum')
@section('content')
<h1 class="h2">Daftar Kurikulum</h1>
    
<div class="card border-left-3 border-left-danger card-2by1">
  <div class="card-body">
    <div class="media align-items-center">
      <div class="media-body">
        <p>Daftar Kurikulum</p>
      </div>
      <div class="media-right">
        <a
          href="{{route('admin.kurikulum.create')}}"
          class="btn btn-success float-right"
        >
          <i class="fa fa-plus"> </i> Tambah Kurikulum
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
                Cari Kurikulum
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
                   placeholder="Cari Kurikulum"
                   aria-label="Cari Kurikulum"
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
        
        <th>Nama</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="list">
        @forelse ($kurikulum as $ku)
          <tr>
            <td>
                {{$ku->nama}}
            </td>

            <td>
              <a  data-toggle="tooltip" data-placement="top" title="Lihat Kurikulum" href="{{route('admin.kurikulum.show', ['kurikulum' => $ku->id_kurikulum])}}" class="btn btn-sm btn-primary">
                <i class="fa fa-eye"></i>
              </a>
              {{-- Form Delete --}}
                <form  data-toggle="tooltip" data-placement="top" title="Hapus Kurikulum" action="{{route('admin.kurikulum.destroy', ['kurikulum' => $ku->id_kurikulum])}}" method="POST" class="d-inline" onclick="return confirm('Apakah yakin akan menghapus {{$ku->nama}} ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
          </tr>
        @empty
            <tr>
                <td colspan="2" class="text-center">
                <h4>Tidak ada data</h4>
                </td>
            </tr>
        @endforelse
    </tbody>
  </table>
  
</div>
@endsection