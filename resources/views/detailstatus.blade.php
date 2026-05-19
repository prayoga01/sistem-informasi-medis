@extends('layouts.main')
@section('home')
<div class="row">
  <div class="col-md-12 mb-3 text-center">
    <h2>STATUS PENGAJUAN</h2>
  </div>
</div>

<div class="row justify-content-center mb-5">
  <div class="col-8 info-panel">
    <form action="">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/pengajuans"
          ><button type="button" class="btn-close" aria-label="Close"></button
        ></a>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label fw-bold">No Rekam Medis</label>
        <div class="col-sm-8">
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
        <label class="col-sm-4 col-form-label fw-bold">Nama Pasien</label>
        <div class="col-sm-8">
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
        <label class="col-sm-4 col-form-label fw-bold">Nama Asuransi</label>
        <div class="col-sm-8">
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
        <label class="col-sm-4 col-form-label fw-bold">Status</label>
        <div class="col-sm-8">
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
        <label class="col-sm-4 col-form-label fw-bold">Pesan Petugas</label>
        <div class="col-sm-8">
          <input
            type="text"
            name="status"
            @if ($pengajuan->status == "Diterima")
              class="form-control-plaintext text-success"  
            @elseif ($pengajuan->status == "Dokumen Selesai")
              class="form-control-plaintext text-success"  
            @else 
              class="form-control-plaintext text-danger"  
            @endif
            size="4"
            value="{{$pengajuan->komentar}}"
            readonly
          />
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label fw-bold">Dokumen Pendukung</label>
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
                ><i class="fa-solid fa-eye"></i> View</a>
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
              ><i class="fa-solid fa-eye"></i> View</a>    
              @else
              <p>
               Anda Tidak Melakukan Upload Dokumen Ini <i class="fa-solid fa-square-xmark text-danger"></i>
              </p>
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>

@endsection