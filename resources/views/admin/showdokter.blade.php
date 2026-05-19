@extends('layouts.main-admin')
@section('konten')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dokter</li>
      </ol>
      <h6 class="font-weight-bolder text-white mb-0">Dokter</h6>
    </nav>
  </div>
</nav>
<div class="container-fluid py-4">
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Tabel Daftar Dokter </h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <div class="tambah" style="width: 30%; text-align: left; float: right;">
                  <a href="/exportexcel" class="btn btn-warning border-0">
                    Export Data
                  </a>
                  <a href="/dokters/create" class="btn btn-success border-0">
                    Tambah Data
                  </a>
                </div>
                <div class="md-6 pe-md-12 d-flex">
                  <form action="/dokters">
                  <div class="input-group">
                    <input  type="text" name="search" class="form-control" placeholder="Search..." aria-label="Search" value="{{ request('search') }}" aria-describedby="button-addon2">
                    {{-- <button class="badge bg-success border-0" type="submit"><i class="fas fa-search"></i></button> --}}
                  </div>
                </form>
                </div>
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIP</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Dokter</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bidang Ahli</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dokters as $dokter)
                  <tr>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex flex-column justify-content-center">
                          <p class="text-xs mb-0">{{ $loop->iteration }}</p>
                        </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $dokter->kd_dokter }}</h6>
                        </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-xs font-weight-bold mb-0">{{ $dokter->nmdokter }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-secondary text-xs font-weight-bold">{{ $dokter->ahli->bidangahli }}</span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <a href="/dokters/{{ $dokter->id }}/edit" class="badge bg-info border-0">
                        Edit
                      </a>
                      <form action="/dokters/{{ $dokter->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">Hapus</button>
                     </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="d-flex justify-content-end">
          {{ $dokters->links() }}
        </div>
        </div>
      </div>
    </div>
</div>
@endsection