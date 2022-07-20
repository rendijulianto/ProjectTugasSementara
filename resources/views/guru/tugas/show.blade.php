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
                <a href="{{route('guru.tugas.show',['id_tugas' => $md->id_tugas])}}" class="{{$md->id_tugas == $tugas->id_tugas ? 'text-white' :'' }} ">{{$md->judul}}</a>
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
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        {{-- Pengumpulan Tugas --}}
        <h4 class="card-title">Pengumpulan Tugas</h4>
        {{-- Table --}}
        <div class="card table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-document" data-lists-sort-desc="true">
          <table class="table mb-0">
            <thead class="thead-light">
              <tr>
                <th>Siswa</th>
                <th>Link </th>
              </tr>
            </thead>
            <tbody class="list">
               @foreach ($tugas->pengumpulan as $tg)
                <tr>
                  <td>{{$tg->siswa->nama}} ({{$tg->siswa->nis}})</td>
                  <td>
                    <a href="{{$tg->link}}" target="_blank">{{$tg->link}}</a>
                  </td>
                </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection