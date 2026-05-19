@extends('layouts.main')

@section('home')
<div class="row">
    <div class="col-md-12 text-center">
       
    </div>
</div>

<div class="row justify-content-center" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
<div class="col-5 info-panel mb-5">

  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(session()->has('loginError'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
    <form action="/login" method="POST">
      @csrf
      <div class="row">
        {{-- <div class="col-md">
            <img src="{{ asset('aset/img/logo RSUD.png') }}" alt="" width="210" height="51" class="d-inline-block align-text-top">
        </div> --}}
        <div class="col-md">
            <div class="form-group mb-3">
              <img src="{{ asset('aset/img/logo RSUD.png') }}" alt="" width="210" height="51" class="d-inline-block align-text-top mb-5">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control radius @error('email') is-invalid @enderror" id="email" placeholder="Email" autofocus required value="{{ old('email') }}">
              @error ('email')
              <div  class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control radius" id="password" placeholder="Password" required>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="sumbit">LOGIN</button>
                <a class="btn btn-danger" href="{{ route('google.login') }}"><i class="fa-brands fa-google"></i> GOOGLE</a>
                <a href="/register"class="btn btn-light">REGISTER</a>
                <small class="d-block">Lakukan registrasi terlebih dahulu jika anda belum memiliki akun untuk login.</small>
            </div>
        </div>
      </div>
    </form>
</div>
</div>
@endsection