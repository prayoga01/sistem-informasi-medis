@extends('layouts.main-admin')
@section('konten')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dokter</li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Add</li>
      </ol>
      <h6 class="font-weight-bolder text-white mb-0">Dokter</h6>
    </nav>
  </div>
</nav>
<div class="row justify-content-center mb-5">
  <div class="col-11 info-panel mb-5">
      <div class="row">
          <form method="POST" action="/dokters" enctype="multipart/form-data">
            @csrf
            <h4 class="text-center mb-3">DATA DIRI DOKTER</h4>
            <div class="form-group col-12 mb-3">
              <label class="fw-bold" for="kd_dokter">NIP</label>
              <input type="text" name="kd_dokter" class="form-control radius @error('kd_dokter') is-invalid @enderror" value="{{ old('kd_dokter') }}">
              @error ('kd_dokter')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group col-12 mb-3">
              <label class="fw-bold" for="nmdokter">Nama Dokter</label>
              <input type="nmdokter" name="nmdokter" class="form-control radius @error('nmdokter') is-invalid @enderror" value="{{ old('nmdokter') }}">
              @error ('nmdokter')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group col-12 mb-3">
              <label class="fw-bold" for="notlp">Bidang Ahli</label>
              <label class="fw-bold" for="statushubungan">Bidang Ahli</label><br>
              <select class="form-select radius" name="ahli_id" id="exampleFormControlSelect1">
              @foreach ($ahlis as $ahli)
              @if (old('ahli_id') == $ahli->id)
                <option value="{{ $ahli->id }}" selected>{{ $ahli->bidangahli }}</option>
              @else
                <option value="{{ $ahli->id }}">{{ $ahli->bidangahli }}</option>
              @endif
              @endforeach
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-success tombol">Submit</button>
        </div>
    </form>
  </div>

@endsection

{{-- <div class="row">
  <form method="POST" action="/dokters" enctype="multipart/form-data">
    @csrf
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
     <a href="/dashboard"><button type="button" class="btn-close" aria-label="Close"></button></a>
    </div>
    <h4 class="text-center mb-3">DATA DIRI PEMOHON</h4>
    <div class="form-group col-6 mb-3">
      <label class="fw-bold" for="kd_dokter">NIP</label>
      <input type="text" name="kd_dokter" class="form-control radius @error('kd_dokter') is-invalid @enderror" value="{{ old('kd_dokter') }}">
      @error ('kd_dokter')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group col-6 mb-3">
      <label class="fw-bold" for="nmdokter">Nama Dokter</label>
      <input type="nmdokter" name="nmdokter" class="form-control radius @error('nmdokter') is-invalid @enderror" value="{{ old('nmdokter') }}">
      @error ('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group col-6 mb-3">
      <label class="fw-bold" for="notlp">Nomor Telepon</label>
      <input type="text" name="no_tlp" class="form-control radius @error('no_tlp') is-invalid @enderror" value="{{ old('kd_dokter') }}">
      @error ('notlp')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  <button type="submit" class="btn btn-primary tombol">Submit</button>
</div>
</form> --}}