@extends('layouts.auth')
@section('title', 'Login Siswa')
@section('content')
<div class="d-flex align-items-center" style="min-height: 100vh">
    <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px">
      <div class="text-center mt-5 mb-1">
        <div class="avatar avatar-lg">
          <img
            src="{{asset('assets/images/logo/primary.svg')}}"
            class="avatar-img rounded-circle"
            alt="LearnPlus"
          />
        </div>
      </div>
      <div class="d-flex justify-content-center mb-5 navbar-light">
        <a href="student-dashboard.html" class="navbar-brand m-0"
          >SMK NEGERI 1 MAJALAYA</a
        >
      </div>
      <div class="card navbar-shadow">
        <div class="card-header text-center">
          <h4 class="card-title">Login Guru</h4>
          <p class="card-subtitle">Selamat datang</p>
        </div>
       
        <div class="card-body">
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
          <form
            action="{{route('auth.isGuru')}}"
            novalidate
            method="POST"
          >
          @csrf
            <div class="form-group">
              <label class="form-label" for="username">Username</label>
              <div class="input-group input-group-merge">
                <input
                  id="username"
                  type="text"
                  required=""
                  name="username"
                  class="form-control form-control-prepended"
                  placeholder="Masukkan Username"
                  value="{{ old('username') }}"
                />
                
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="far fa-user"></span>
                  </div>
                </div>
              </div>
              @if ($errors->has('username'))
                <small class="invalid feedback text-danger"role="alert">
                    <i>*{{ $errors->first('username') }}.</i>
                </small>
               @endif
            </div>
            <div class="form-group">
              <label class="form-label" for="password">Password:</label>
              <div class="input-group input-group-merge">
                <input
                  id="password"
                  type="password"
                  required=""
                  name="password"
                  class="form-control form-control-prepended"
                  placeholder="Masukkan Password"
                />
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="far fa-keyboard"></span>
                  </div>
                </div>
              </div>
              @if ($errors->has('password'))
                <small class="invalid feedback text-danger"role="alert">
                    <i>*{{ $errors->first('password') }}.</i>
                </small>
               @endif
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">
                Masuk
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection