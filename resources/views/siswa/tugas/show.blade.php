@extends('layouts.main')
@section('title','Detail Tugas')
@section('content')
<h1 class="h2">Detail Tugas</h1>
<div class="card border-left-3 border-left-danger card-2by1">
    <div class="card-body">
      <div class="media align-items-center">
        <div class="media-body">
          <p>{{$tugas->jadwal->mapel->nama}}</p>
          <b> {{$tugas->judul}} </b>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          {!!$tugas->konten!!}
        </div>
      </div>

      <!-- Lessons -->
      <ul class="card list-group list-group-fit">
        @php
            $i=1;
            $materis = App\Models\Tugas::where('id_jadwal', $tugas->id_jadwal)->get();
        @endphp

        @forelse ($materis as $md)
        <li class="list-group-item {{$md->id_tugas == $tugas->id_tugas ? 'active' :'' }}">
            <div class="media">
              <div class="media-left">
                <div class="">{{$i}}</div>
              </div>
              
              <div class="media-body">
                <a href="{{route('siswa.tugas.show',['id_tugas' => $md->id_tugas, 'id_jadwal' => $md->id_jadwal])}}" class="{{$md->id_tugas == $tugas->id_tugas ? 'text-white' :'' }} ">{{$md->judul}}</a>
              </div>
              <div class="media-right">
                <small class="text-muted-light">{{$md->tanggal_tutup}}</small>
              </div>
            </div>
          </li>
          @php
              $i++;
          @endphp
        @empty
        <li class="list-group-item">
          <div class="media">
            <div class="media-body">
              <h5 class="mt-0">Belum ada tugas</h5>
            </div>
          </div>
        </li>
        @endforelse
      
      </ul>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <div class="media align-items-center">
            <div class="media-left">
              <img src="{{asset('assets/images/people/110/guy-6.jpg')}}" alt="About Adrian" width="50" class="rounded-circle">
            </div>
            <div class="media-body">
              <h4 class="card-title">
                <a href="#">{{$tugas->jadwal->guru->nama}}</a>
              </h4>
            @if ($tugas->jadwal->guru->nip)
                <p class="card-subtitle">{{$tugas->jadwal->guru->nip}}</p>
            @endif
            
            </div>
          </div>
        </div>
        <div class="card-body">
          <p>
            {{$tugas->jadwal->guru->alamat}}
          </p>
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
  <div class="col-lg-8">
    <div class="card">
      <div class="card-body">
        <form class="row" method="POST" action="{{route('siswa.tugas.store', ['id_jadwal' => $tugas->id_jadwal, 'id_tugas' => $tugas->id_tugas])}}">
          @csrf
          <div class="form-group col-12">
            <label class="col-form-label">
              <strong>Jawaban</strong>
            </label>
            @if(App\Models\PengumpulanTugas::where('id_tugas', $tugas->id_tugas)->where('id_siswa', 2)->count() > 0)
            <textarea class="form-control"  name="link" readonly name="jawaban" rows="10" placeholder="Tulis Jawaban Anda Disini">{{App\Models\PengumpulanTugas::where('id_tugas', $tugas->id_tugas)->where('id_siswa', 2)->first()->link}}</textarea>
            @else
            <textarea name="link" class="form-control" rows="3" placeholder="Tulis jawaban anda disini"></textarea>
            @endif
            @if ($errors->has('link'))
            <small class="invalid feedback text-danger"role="alert">
                <i>*{{ $errors->first('link') }}.</i>
            </small>
           @endif
          </div>
          <div class="col-12">
             @if ($tugas->tanggal_tutup > date('Y-m-d H:i:s') AND App\Models\PengumpulanTugas::where('id_tugas', $tugas->id_tugas)->where('id_siswa', 2)->count() < 0))
             <button type="submit" class="btn btn-primary btn-block">
              Kirim Jawaban
            </button>
            @else
            <button type="submit" class="btn btn-primary btn-block" disabled>
              Tugas Sudah Tutup / Sudah Mengumpulkan
            </button>
             @endif
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection