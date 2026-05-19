@extends('layouts.main-admin')
@section('konten')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Arsip</li>
      </ol>
      <h6 class="font-weight-bolder text-white mb-0">Arsip</h6>
    </nav>
  </div>
</nav>
       <div class="jumbotron">
       <div class="row justify-content-center mb-5">
        <div class="col-11 info-panel mb-5">
          <div class="row">
            <form method="POST" action="/pengajuans/{{ $pengajuan->id }}" enctype="multipart/form-data">
              @method('put')
              @csrf 
            <h4 class="text-center mb-3">DOKUMEN WAJIB DI UPLOAD</h4>
            <div class="form-group mb-3">
              <label for="file_asuransi"><b>Dokumen Asuransi</b></label><br>
              <span>Upload Dokumen Arsip Asuransi </span>
              <input type="hidden" name="oldFile1" value="{{ $pengajuan->file_asuransi }}">
              @if ($pengajuan->file_asuransi)
                <a class="btn btn-success col-sm-3 d-block mb-2" target="_blank" href="{{ asset('storage/' .$pengajuan->file_asuransi) }}">File Asuransi Anda</a>
              @endif
                <input type="file" name="file_asuransi" id="file_asuransi" class="form-control @error('file_asuransi') is-invalid @enderror">
              @error ('file_asuransi')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
           </div>
            <button type="submit" class="btn btn-primary tombol">Simpan</button>
          </form>
        </div>

        <div class="col-11 info-panel mb-5">
                <div class="row">
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                   <a href="/dashboard"><button type="button" class="btn-close" aria-label="Close"></button></a>
                  </div>
                  <h4 class="text-center mb-3">DATA DIRI PEMOHON</h4>
                  <div class="form-group col-6 mb-3">
                    <label for="nmpemohon">Nama Pemohon</label>
                    <input type="text" name="nmpemohon" class="form-control radius @error('nmpemohon') is-invalid @enderror" value="{{ old('nmpemohon', $pengajuan->user->name) }}" readonly>
                    @error ('nmpemohon')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control radius @error('email') is-invalid @enderror" value="{{ old('email', $pemohon->email) }}" readonly>
                    @error ('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label for="notlp">Nomor Telepon</label>
                    <input type="number" name="notlp" class="form-control radius @error('notlp') is-invalid @enderror" value="{{ old('notlp', $pemohon->no_tlp) }}" readonly>
                    @error ('notlp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label for="statushubungan">Hubungan Dengan Pasien/Pemegang Polis</label><br>
                    <select class="form-control radius" name="hubungan" id="exampleFormControlSelect1" disabled>
                      @if (old('hubungan') == 'Pemegang Polis')
                      <option value="Pemegang Polis" selected>Pemegang Polis</option>
                      <option value="Pemegang surat kuasa (yang diberikan kewenangan) selected">Pemegang surat kuasa (yang diberikan kewenangan)</option>
                      @else
                      <option value="Pemegang Polis">Pemegang Polis</option>
                      <option value="Pemegang surat kuasa (yang diberikan kewenangan) selected" selected>Pemegang surat kuasa (yang diberikan kewenangan)</option>
                      @endif
                    </select>
                  </div>
                </div>
          </div>
          
          <div class="col-11 info-panel mb-5">
                <div class="row">
                  <h4 class="text-center mb-3">DATA DIRI PASIEN</h4>
                  <div class="form-group col-6 mb-3">
                    <label for="no_rm">Nomor Rekam Medis Pasien</label>
                    <input type="text" name="no_rm" class="form-control radius @error('no_rm') is-invalid @enderror" value="{{ old('no_rm', $pengajuan->no_rm) }}" readonly>
                    @error ('no_rm')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label for="nm_pasien">Nama Pasien</label>
                    <input type="text" name="nm_pasien" class="form-control radius  @error('nm_pasien') is-invalid @enderror" value="{{ old('nm_pasien', $pengajuan->nm_pasien) }}" readonly>
                    @error ('nm_pasien')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control radius @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir', $pengajuan->tgl_lahir) }}" readonly>
                    @error ('tgl_lahir')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label for="tgl_rawat">Tanggal Dirawat</label>
                    <input type="date" name="tgl_rawat" class="form-control radius @error('tgl_rawat') is-invalid @enderror" value="{{ old('tgl_rawat', $pengajuan->tgl_rawat) }}" readonly>
                    @error ('tgl_rawat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label for="nm_asuransi">Nama Asuransi</label>
                    <input type="text" name="nm_asuransi" class="form-control radius @error('nm_asuransi') is-invalid @enderror" value="{{ old('nm_asuransi', $pengajuan->nm_asuransi) }}" readonly>
                    @error ('nm_asuransi')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label class="fw-bold" for="statushubungan">Nama Dokter</label><br>
                    <select class="form-select radius" name="dokter_id" id="exampleFormControlSelect1" disabled>
                    @foreach ($dokters as $dokter)
                    @if (old('dokter_id',$pengajuan->dokter_id) == $dokter->id)
                      <option value="{{ $dokter->id }}" selected>{{ $dokter->nmdokter}} - {{ $dokter->ahli->bidangahli }}</option>
                    @else
                      <option value="{{ $dokter->id }}">{{ $dokter->nmdokter}}- {{ $dokter->bidangahli }}</option>
                    @endif
                    @endforeach
                    </select>
                  </div>
                </div>
          </div>
        </div>
      </div>
@endsection