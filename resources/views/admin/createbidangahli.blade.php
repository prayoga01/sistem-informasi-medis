@extends('layouts.main-admin')
@section('konten')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Bidang Ahli</li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Add</li>
      </ol>
      <h6 class="font-weight-bolder text-white mb-0">Bidang Ahli</h6>
    </nav>
  </div>
</nav>
<div class="row justify-content-center mb-5">
  <div class="col-11 info-panel mb-5">
      <div class="row">
          <form method="POST" action="/ahlis" enctype="multipart/form-data">
            @csrf
            <h4 class="text-center mb-3">BIDANG AHLI</h4>
            <div class="form-group col-12 mb-3">
              <label class="fw-bold" for="bidangahli">Bidang Ahli</label>
              <input type="text" name="bidangahli" class="form-control radius @error('bidangahli') is-invalid @enderror" value="{{ old('bidangahli') }}" required>
              @error ('bidangahli')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
        </div>
          <button type="submit" class="btn btn-success tombol">Submit</button>
        </div>
    </form>
  </div>


@endsection
