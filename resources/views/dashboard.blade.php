@extends('layouts.main')
@section('home')
    <div class="jumbotron jumbotron-fluid mt-5 mb-5">
        <div class="row">
            <div class="col mt-5 text-center info-pelayanan">
                <h1>Layanan Online
                  Pengajuan Pelepasan<br> 
                  Informasi Kesehatan</h1><br>
                <p class="lead">Ajukan permohonan pelepasan medis anda secara mudah sekarang. </p>
            </div>
        </div>
    </div>
    
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row justify-content-center text-center">
      <div class="col-md-4">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem; border: none;">
          <div class="card-body">
            <h5 class="card-title">PENGAJUAN PELEPASAN INFORMASI KESEHATAN</h5>
          </div>
          <div class="card-footer text-center">
            <a href="/pengajuans/create"><i class="fa-solid fa-circle-arrow-right text-white"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">PENGAJUAN PELEPASAN INFORMASI SELESAI</h5>
          </div>
          <div class="card-footer text-center">
            <a href="/pengajuanselesais"><i class="fa-solid fa-circle-arrow-right text-white"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">MONITORING DOKUMEN PENGAJUAN</h5>
          </div>
          <div class="card-footer text-center">
            <a href="/pengajuans"><i class="fa-solid fa-circle-arrow-right text-white"></i></a>
          </div>
        </div>
      </div>
    </div>

    
@endsection