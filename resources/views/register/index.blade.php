@extends('layouts.main')

@section('home')
<div class="row">
    <div class="col-md-12 mt-5 mb-5 text-center" data-aos="fade-down" data-aos-duration="1000">
      <h2>REGISTRATION FORM</h2> 
    </div>
</div>


<div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1000">
  <div class="col-lg-11 info-panel">
      <form action="/register" method="POST">
        @csrf
        <div class="row">
          <div class="form-group col-lg-6 mb-3">
            <label for="name">Nama Pemohon</label>
            <input type="text" name="name" class="form-control radius @error('name') is-invalid @enderror" id="name" placeholder="Nama Pemohon" value="{{ old('name') }}">
            @error ('name')
            <div  class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group col-lg-6 mb-3">
            <label for="no_tlp">Nomor Telepon</label>
            <input type="text" name="no_tlp" class="form-control radius @error('no_tlp') is-invalid @enderror" id="no_tlp" placeholder="Nomor Telepon" value="{{ old('no_tlp') }}">
            @error ('no_tlp')
            <div  class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group col-lg-6 mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control radius @error('email') is-invalid @enderror" id="email" placeholder="name@gmail.com" value="{{ old('email') }}">
            @error ('email')
            <div  class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group col-lg-6 mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control radius @error('password') is-invalid @enderror" id="password" placeholder="password" value="{{ old('password') }}">
            @error ('password')
            <div  class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <button class="btn btn-primary tombol" type="sumbit">Submit</button>
        <a href="/login" class="btn btn-light tombol">Login</a>
      </form>
  </div>
</div>
  
@endsection