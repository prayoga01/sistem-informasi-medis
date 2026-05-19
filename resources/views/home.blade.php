@extends('layouts.main')
@section('home')
<div class="jumbotron mt-5 mb-5" id="home">
<div class="row">
        <div class="col-md-6 mt-5 info-pelayanan" data-aos="fade-right" data-aos-duration="2000">
          <h1>
            Layanan Online<br />
            Pengajuan Pelepasan <br />
            Informasi Kesehatan
          </h1>
          <br />
          <p class="lead">
            Ajukan permohonan pelepasan medis anda secara mudah sekarang.
          </p>
          <a href="/login" class="btn btn-info text-white tombol"
            >Ajukan Permohonan <i class="fa-solid fa-paper-plane fa-5 ms-2"></i
          ></a>
        </div>
        <div class="col-md-6 mata" data-aos="fade-left" data-aos-duration="2000">
          <img src="{{ asset('aset/img/tim.png') }}"alt="" 
          style="width: 550px;height: 360px;" 
          />
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-6 mt-5 mb-5">
        <img
          src="{{ asset('aset/img/syarat.png') }}"
          alt=""
          class="img-fluid"
          data-aos="fade-right"
          data-aos-duration="2000"
        />
      </div>
      <div class="col-md-6 md-6 mt-5 mb-5 info-sdk" id="s&k">
        <h2 data-aos="fade-up" data-aos-duration="1500">
          Syarat & Ketentuan<br />pengajuan
        </h2>
        <br />
        <div class="konten" data-aos="fade-left" data-aos-duration="2000">
          <p>
            1. Surat kuasa bermatrai Rp.10.000 (apabila dikuasakan)<br />
            2. Blangko isian dari pihak asuransi.
          </p>
          {{-- <a
            href=""
            class="btn btn-info tombol text-white"
            ><i class="fa-solid fa-file-arrow-down me-2"></i> Download Surat Kuasa</a
          > --}}
        </div>
      </div>
    </div>
    
    <div class="row alurpengajuan">
      <div class="col-md-6 md-6 mt-5 mb-5 info-sdk" id="s&k">
        <h2 data-aos="fade-up" data-aos-duration="1500">
          Alur Pengajuan<br/>Pelepasan Infirmasi Medis
        </h2>
        <br />
        <div class="konten" data-aos="fade-left" data-aos-duration="2000">
          <p>
            1. Mengakses website pelepasan informasi<br />
            2. Mengupload dokumen pengajuan seperti yang sudah tertera di syarat dan ketentuan.<br />
            3. Menunggu proses verifikasi dokumen oleh petugas. <br />
            4. Dokumen selesai, anda dapat melakukan pembayaran ke loket pembayaran.<br />
            5. Dokumen dapat diambil di loket Instalasi Rekam Medis .<br />

          </p>
        </div>
      </div>
      <div class="col-md-6 mt-5 text-center info-alurpengajuan" id="alur">
        <img
          src="{{asset('aset/img/alur pengajuan.png') }}"
          alt=""
          data-aos="zoom-out-up"
          data-aos-duration="1500"
          style="width: 600px;height: 600px;"
        />
      </div>
    </div>
    
    <footer>
      <div class="row justify-content-center info-panel bg-info mt-4 mb-4"
      data-aos="zoom-out-up"
      data-aos-duration="1500">
        <div class="col-md-6 info-pelayanan mt-5" style="color: aliceblue">
          <h1>Melayani Adalah Kewajiban Kami.</h1>
          <br/>
          <span 
            >Menjadi tugas pokok, Menyelenggarakan pelayanan kesehatan yang bermutu
            sesuai dengan standar pelayanan Rumah Sakit.</span>
        </div>
        <div class="col-md-6">
          <img
            src="{{ asset('aset/img/dokter-ilustrasi.png') }}"
            alt=""
            width="480"
            height="420"
          />
        </div>
      </div>
    </footer>
    
@endsection
    


      