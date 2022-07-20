@extends('layouts.main')
@section('title','Detail Materi')
@section('content')
<h1 class="h2">Detail Materi</h1>
<div class="card border-left-3 border-left-danger card-2by1">
    <div class="card-body">
      <div class="media align-items-center">
        <div class="media-body">
          <p>{{$materi->jadwal->mapel->nama}}</p>
          <b> {{$materi->judul}} </b>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          {!!$materi->konten!!}
        </div>
      </div>

      <!-- Lessons -->
      <ul class="card list-group list-group-fit">
        @php
            $i=1;
            $materis = App\Models\Materi::where('id_jadwal', $materi->id_jadwal)->get();
        @endphp

        @forelse ($materis as $md)
        <li class="list-group-item {{$md->id_materi == $materi->id_materi ? 'active' :'' }}">
            <div class="media">
              <div class="media-left">
                <div class="">{{$i}}</div>
              </div>
              
              <div class="media-body">
                <a href="{{route('siswa.materi.show',['id_materi' => $md->id_materi, 'id_jadwal' => $md->id_jadwal])}}" class="{{$md->id_materi == $materi->id_materi ? 'text-white' :'' }} ">{{$md->judul}}</a>
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
              <h5 class="mt-0">Belum ada materi</h5>
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
                <a href="#">{{$materi->jadwal->guru->nama}}</a>
              </h4>
            @if ($materi->jadwal->guru->nip)
                <p class="card-subtitle">{{$materi->jadwal->guru->nip}}</p>
            @endif
            
            </div>
          </div>
        </div>
        <div class="card-body">
          <p>
            {{$materi->jadwal->guru->alamat}}
          </p>
        </div>
      </div>
    </div>
</div>



@endsection