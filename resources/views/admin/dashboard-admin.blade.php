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
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <a href="/pengajuans">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengajuan Masuk</p>
                  {{-- <h5 class="font-weight-bolder">
                    $53,000
                  </h5> --}}
                </a>
                </div>
              </div>
              {{-- <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <a href="/pengambilans">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengambilan Dokumen</p>
                  </a>
                </div>
              </div>
              <div class="col-4 text-end">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <a href="/arsips">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengelolaan Arsip</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <a href="/dokters">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Kelola Dokter</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
          <div class="row">
            <div class="col-md-6">
              <img
              src="{{ asset('aset/img/dokter-ilustrasi.png') }}"
              alt=""
              width="350px"
              height="350px"
              />
            </div>
            <div class="col-md-6 info-pelayanan mt-5" style="color: rgb(0, 0, 0)">
              <h5>Melayani Adalah Tugas Kami.</h5>
              <br/>
              <span 
                >Menjadi tugas pokok, Menyelenggarakan pelayanan kesehatan yang bermutu
                sesuai dengan standar pelayanan Rumah Sakit.</span>
            </div>
      </div>
      </div>
    </div>
  </div>
@endsection