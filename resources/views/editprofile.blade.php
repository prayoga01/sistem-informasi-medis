@extends('layouts.main')

@section('home')
<div class="row">
    <div class="col-md-12 text-center">
      <h5>PROFILE USER</h5> 
    </div>
</div>

<div class="row justify-content-center mt-5" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
<div class="col-11 info-panel">

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
    <form action="{{ route('profileupdate') }}" method="POST">
    @method('PUT')
      @csrf
      <div class="row">
            <div class="form-group col-lg-6 mb-3">
              <label for="email">Nama</label>
              <input type="text" name="name" class="form-control radius" value="{{ old('name',$datauser->name) }}">
            </div>
            <div class="form-group col-lg-6 mb-3">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control radius" value="{{ old('email',$datauser->email) }}">
            </div>
            <div class="form-group col-lg-6 mb-3">
              <label for="password">Nomor Telepon</label>
              <input type="text" name="no_tlp" class="form-control radius" value="{{ old('no_tlp', $datauser->no_tlp) }}">
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="sumbit">Ubah</button>
                <a href="/dashboard"class="btn btn-light">Kembali</a>
            </div>
      </div>
    </form>
</div>
</div>
@endsection
