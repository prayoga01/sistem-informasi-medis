@extends('layouts.main-admin')
@section('konten')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Kelola Pengambilan</li>
      </ol>
      <h6 class="font-weight-bolder text-white mb-0">Kelola Pengambilan</h6>
    </nav>
  </div>
</nav>
<div class="row">
  <div class="col-md-12 mt-5 mb-5 text-center">
      <h3 class="text-white">FORM PENYERAHAN DOKUMEN</h3>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12 mb-5 info-panel">
      <form method="POST" action="/pengambilans/{{ $pengajuan->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <h5 class="text-center">DATA DIRI PENGAMBIL</h5>
        <div class="row">
          <div class="form-group col-6 mb-3">
            <label for="keputusan">Tanggal Pengambilan</label>
            <input type="date" name="tgl_pengambilan" class="form-control radius @error('tgl_pengambilan') is-invalid @enderror"
            @if ($pengajuan->statuspengambilan == "Diserahkan")
            readonly
            @endif
            value="{{ $pengajuan->tgl_pengambilan }}">
            @error ('tgl_pengambilan')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group col-6 mb-3">
            <label for="nmpengambil">Nama Pengambil</label>
            <input type="text" name="nmpengambil" class="form-control radius @error('nmpengambil') is-invalid @enderror"
            @if ($pengajuan->statuspengambilan == "Diserahkan")
            readonly
            @endif
            value="{{ $pengajuan->nmpengambil }}">
            @error ('nmpengambil')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
      </div>
      @if (!strcmp($pengajuan->statuspengambilan,"Belum Diambil"))            
        <button class="btn btn-success" type='submit' name="statuspengambilan" value="Diserahkan">Serahkan</button>         
        @endif
    </form>
    </div>
    
    <div class="col-md-12 mb-5 info-panel">
        <h5 class="text-center">DATA DIRI PEMOHON</h5>
        <div class="row">
        <div class="form-group col-6 mb-3">
          <label for="nmpemohon">Nama Pemohon</label>
          <input type="text" name="nmpemohon" class="form-control radius @error('nmpemohon') is-invalid @enderror" value="{{ $pengajuan->user->name }}" readonly readonly>
          @error ('nmpemohon')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group col-6 mb-3">
          <label for="no_rm">Nomor Rekam Medis Pasien</label>
          <input type="text" name="no_rm" class="form-control radius @error('no_rm') is-invalid @enderror" value="{{ $pengajuan->no_rm }}" readonly>
          @error ('no_rm')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group col-6 mb-3">
          <label for="nmpasien">Nama Pasien</label>
          <input type="text" name="nmpasien" class="form-control radius  @error('nmpasien') is-invalid @enderror" value="{{ $pengajuan->nm_pasien }}" readonly>
          @error ('nmpasien')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group col-6 mb-3">
          <label for="nmasuransi">Nama Asuransi</label>
          <input type="text" name="nmasuransi" class="form-control radius @error('nmasuransi') is-invalid @enderror" value="{{ $pengajuan->nm_asuransi }}" readonly>
          @error ('nmasuransi')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <h5 class="text-center mt-5">DOKUMEN YANG DIUPLOAD</h5>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nama Dokumen</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Dokumen Asuransi</td>
            <td>
              <a
                class="btn btn-success"
                target="_blank"
                href="{{ asset('storage/' .$pengajuan->file_asuransi) }}"
                ></i> Dokumen Asuransi</a>
            </td>
          </tr>
          <tr>
            <td>Surat Kuasa</td>
            <td>
              @if ($pengajuan->file_suratkuasa)
              <a
              class="btn btn-success"
              target="_blank"
              href="{{ asset('storage/' .$pengajuan->file_suratkuasa) }}"
              >Surat Kuasa</a>    
              @else
              <p class="text-danger">
              Surat Tidak Tersedia
              </p>
              @endif
            </td>
          </tr>
        </tbody>
      </table>

    </div>
    

    










  </div>
</div>
@endsection