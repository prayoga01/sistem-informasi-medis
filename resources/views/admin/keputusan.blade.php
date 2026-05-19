@extends('layouts.main-admin')
@section('konten')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Kelola Pengajuan</li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Keputusan</li>
      </ol>
      <h6 class="font-weight-bolder text-white mb-0">Kelola Pengajuan</h6>
    </nav>
  </div>
</nav>
<div class="container-fluid py-4">
<div class="row justify-content-center">
    <div class="col-12 info-panel">
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nama Pemohon</label>
          <div class="col-sm-6">
            <input
              type="text"
              name="nmpemohon"
              class="form-control-plaintext"
              size="4"
              value="{{$pengajuan->nmpemohon}}"
              readonly
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">No Rekam Medis</label>
          <div class="col-sm-6">
            <input
              type="text"
              name="no_rm"
              class="form-control-plaintext"
              size="4"
              value="{{$pengajuan->no_rm}}"
              readonly
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nama Pasien</label>
          <div class="col-sm-6">
            <input
              type="text"
              name="nm_pasien"
              class="form-control-plaintext"
              size="4"
              value="{{$pengajuan->nm_pasien}}"
              readonly
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nama Asuransi</label>
          <div class="col-sm-6">
            <input
              type="text"
              name="nm_asuransi"
              class="form-control-plaintext"
              size="4"
              value="{{$pengajuan->nm_asuransi}}"
              readonly
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Status</label>
          <div class="col-sm-6">
            <input
              type="text"
              name="status"
              class="form-control-plaintext"
              size="4"
              value="{{$pengajuan->status}}"
              readonly
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Dokumen Pendukung</label>
        </div>
        <table class="table table-bordered">
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
                  ></i> Detail</a>
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
                >Detail</a>    
                @else
                <p class="text-danger">
                 Surat Tidak Tersedia
                </p>
                @endif
              </td>
            </tr>
          </tbody>
        </table>

        {{--  ubah status dan beri komentar--}}
        <form action="/pengajuans/{{ $pengajuan->id }}" method="POST">
          @method('patch')
          @csrf
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="statushubungan">Nama Dokter</label><br>
            <select class="form-select radius col-sm-6" name="dokter_id" id="exampleFormControlSelect1" 
            @if ($pengajuan->status == 'Dokumen Selesai')
            disabled
            @endif
            >
            @foreach ($dokters as $dokter)
            @if (old('dokter_id',$pengajuan->dokter_id) == $dokter->id)
              <option value="{{ $dokter->id }}" selected>{{ $dokter->nmdokter}} - {{ $dokter->ahli->bidangahli }}</option>
            @else
              <option value="{{ $dokter->id }}">{{ $dokter->nmdokter}}- {{ $dokter->ahli->bidangahli }}</option>
            @endif
            @endforeach
            </select>
          </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Komenar</label>
            <input
              type="text"
              name="komentar"
              @if ($pengajuan->status == 'Dokumen Selesai')
              readonly
              @endif
              class="form-control @error('komentar') is-invalid @enderror"    
              size="4"
              placeholder="Tinggalkan komentar"
              value="{{ old('komentar', $pengajuan->komentar) }}"
              
            />
            @error ('komentar')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>

        @if (!strcmp($pengajuan->status,"menunggu"))            
        <button class="btn btn-success" type='submit' name="status" value="Diterima">Accept</button>
        <button class="btn btn-info" type='submit' name="status" value="Periksa Ulang">Rechech</button>           
        <button class="btn btn-outline-danger" type='submit' name="status" value="Ditolak">Decline</button>           
        @endif

        @if (!strcmp($pengajuan->status,"Periksa Ulang"))            
        <button class="btn btn-success" type='submit' name="status" value="Diterima">Accept</button>
        <button class="btn btn-danger" type='submit' name="status" value="Ditolak">Decline</button>           
        <button class="btn btn-info" type='submit' name="status" value="Periksa Ulang">Rechech</button>           
        @endif
        
        @if (!strcmp($pengajuan->status,"Diterima")) 
        <button class="btn btn-success" type='submit' name="status" value="Dokumen Selesai">Selesai</button>
        <button class="btn btn-danger" type='submit' name="status" value="Ditolak">Decline</button>
        @endif

        @if (!strcmp($pengajuan->status,"Ditolak")) 
        <button class="btn btn-success" type='submit' name="status" value="Diterima">Accept</button>
        <button class="btn btn-info" type='submit' name="status" value="Periksa Ulang">Rechech</button>
        @endif

        {{-- @if (!strcmp($pengajuan->status,"Diperoses")) 
        <button class="btn btn-success" type='submit' name="status" value="Dokumen Selesai">Selesai</button>
        <button class="btn btn-danger" type='submit' name="status" value="Ditolak">Decline</button>
        @endif --}}
        </form>
    </div>
</div>
</div>
@endsection