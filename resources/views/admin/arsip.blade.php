@extends('layouts.main-admin')
@section('konten')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
      </nav>
    </div>
  </nav>
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Tabel Daftar Arsip </h6>
          </div>
          <div class="md-6 pe-md-12 d-flex">
            <form action="/arsips">
            <div class="input-group">
              <input  type="text" 
              name="search" 
              class="form-control" 
              placeholder="Search..." 
              aria-label="Search" 
              value="{{ request('search') }}"
              aria-describedby="button-addon2">
            </div>
          </form>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            @if ($pengajuans->count())
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pemohon</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pasien</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Rekam Medis</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Asuransi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pengajuan</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pengajuans as $pengajuan)
                  <tr>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex flex-column justify-content-center">
                          <p class="text-xs mb-0">{{ $loop->iteration }}</p>
                        </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $pengajuan->user->name }}</h6>
                          <p class="text-xs text-secondary mb-0">{{ $pengajuan->hubungan}}</p>
                        </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-xs font-weight-bold mb-0">{{ $pengajuan->nm_pasien }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-secondary text-xs font-weight-bold">{{ $pengajuan->no_rm }}</span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold mb-0">{{ $pengajuan->nm_asuransi}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span
                      @if ($pengajuan->status == "menunggu")
                       class="badge badge-sm bg-warning text-dark"
                       @elseif ($pengajuan->status == "Diterima")
                       class="badge badge-sm bg-info"
                       @elseif ($pengajuan->status == "Diperoses")
                       class="badge badge-sm bg-warning"
                       @elseif ($pengajuan->status == "Dokumen Selesai")
                       class="badge badge-sm bg-success"
                       @else 
                      class="badge badge-sm bg-danger" 
                      @endif
                       >{{ $pengajuan->status}}</span>
                    </td>
                    <td class="align-middle text-center text-sm">{{ $pengajuan->created_at->format('d-m-Y') }}</td>
                    <td class="align-middle text-center text-sm">
                      <a href="/pengajuans/{{ $pengajuan->id }}/edit" class="btn btn-link btn-sm mb-0">
                        Detail
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
                  <p class="text-center fs-6">Data arsip tidak ditemukan....</p>
              @endif
            </div>
            <div class="d-flex justify-content-end">
              {{ $pengajuans->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection