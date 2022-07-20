@extends('layouts.main')
@section('title','Laporan')
@section('content')

<h1 class="h2">Laporan </h1>
    
<div class="card border-left-3 border-left-danger card-2by1">
  <div class="card-body">
    <div class="media align-items-center">
      <div class="media-body">
        <p>Laporan </p>
      </div>       
    </div>
  </div>
</div>
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
        <div class="card">
            <div class="card-body">
                 {{-- Input Range Date --}}
                <form class="row" action="{{route('admin.laporan.setRange')}}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label"
                                   for="flatpickrSample02">Range</label>
                            <input id="flatpickrSample02"
                                   type="text"
                                   name="range"
                                   class="form-control"
                                   placeholder="Flatpickr range example"
                                   data-toggle="flatpickr"
                                   data-flatpickr-mode="range"
                                   value="{{config('app.DATE_START_REPORT')}} to {{config('app.DATE_END_REPORT')}}"
                            />
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">SET</button>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-block btn-success">
                                     Laporan Materi
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-block btn-danger">
                                     Laporan Tugas
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body row">
                    <div class="col-6 col-lg-4 mb-2">
                        <button class="btn btn-secondary btn-block">
                            Laporan Mata Pelajaran
                        </button>
                    </div>
                    <div class="col-6 col-lg-4 mb-2">
                        <button class="btn btn-primary btn-block">
                            Laporan Kurikulum
                        </button>
                    </div>
                    <div class="col-6 col-lg-4 mb-2">
                        <button class="btn btn-warning btn-block">
                            Laporan Daftar Kelas
                        </button>
                    </div>
                    <div class="col-6 mb-2">
                        <button class="btn btn-success btn-block">
                           
                            Laporan Daftar Siswa
                        </button>
                    </div>
                    <div class="col-6 mb-2">
                        <button class="btn btn-warning btn-block">
                            Laporan Daftar Guru
                        </button>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection