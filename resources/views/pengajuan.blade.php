@extends('layouts.main')
@section('home')
    <div class="row">
        <div class="col-md-12 mt-5 mb-5 text-center">
            <h2>FORM PENGAJUAN</h2>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-11 info-panel mb-5">
            <div class="row">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/dashboard"><button type="button" class="btn-close" aria-label="Close"></button></a>
                </div>
                <h4 class="text-center mb-3">DATA DIRI PEMOHON</h4>
                <div class="form-group col-6 mb-3">
                    <label class="fw-bold" for="nmpemohon">Nama Pemohon</label>
                    <input type="text" name="nmpemohon"
                        class="form-control radius @error('nmpemohon') is-invalid @enderror" value="{{ $datauser->name }}"
                        readonly>
                    @error('nmpemohon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-6 mb-3">
                    <label class="fw-bold" for="email">Email</label>
                    <input type="email" name="email" class="form-control radius @error('email') is-invalid @enderror"
                        value="{{ $datauser->email }}" readonly>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-6 mb-3">
                    <label class="fw-bold" for="notlp">Nomor Telepon</label>
                    <input type="text" name="no_tlp" class="form-control radius @error('no_tlp') is-invalid @enderror"
                        value="{{ $datauser->no_tlp }}" readonly>
                    @error('notlp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-6 mb-3">
                    {{-- PROSES CREATE --}}
                    <form method="POST" action="/pengajuans" enctype="multipart/form-data">
                        @csrf
                        <label class="fw-bold" for="statushubungan">Hubungan Dengan Pasien/Pemegang Polis<span
                                class="text-danger">&#42</span></label><br>
                        <select class="form-select radius" name="hubungan" id="exampleFormControlSelect1" autofocus>
                            <option value="Pemegang Polis">Pemegang Polis</option>
                            <option value="Pemegang surat kuasa (yang diberikan kewenangan)">Pemegang surat kuasa (yang
                                diberikan kewenangan)</option>
                        </select>
                </div>
            </div>
        </div>

        <div class="col-11 info-panel mb-5">
            <div class="row">
                <h4 class="text-center mb-3">DATA DIRI PASIEN</h4>
                <div class="form-group col-6 mb-3">
                    <label class="fw-bold" for="no_rm">Nomor Rekam Medis Pasien</label>
                    <input type="text" name="no_rm" class="form-control radius @error('no_rm') is-invalid @enderror"
                        value="{{ old('no_rm') }}">
                    @error('no_rm')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-6 mb-3">
                    <label class="fw-bold" for="nm_pasien">Nama Pasien</label>
                    <input type="text" name="nm_pasien"
                        class="form-control radius  @error('nm_pasien') is-invalid @enderror"
                        value="{{ old('nm_pasien') }}">
                    @error('nm_pasien')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-6 mb-3">
                    <label class="fw-bold" for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir"
                        class="form-control radius @error('tgl_lahir') is-invalid @enderror"
                        value="{{ old('tgl_lahir') }}">
                    @error('tgl_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-6 mb-3">
                    <label class="fw-bold" for="tgl_rawat">Tanggal Dirawat</label>
                    <input type="date" name="tgl_rawat"
                        class="form-control radius @error('tgl_rawat') is-invalid @enderror"
                        value="{{ old('tgl_rawat') }}">
                    @error('tgl_rawat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-6 mb-3">
                    <label class="fw-bold" for="nm_asuransi">Nama Asuransi</label>
                    <input type="text" name="nm_asuransi"
                        class="form-control radius @error('nm_asuransi') is-invalid @enderror"
                        value="{{ old('nm_asuransi') }}">
                    @error('nm_asuransi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-6 mb-3">
                    <label class="fw-bold" for="statushubungan">Nama Dokter</label><br>
                    <select class="form-select radius" name="dokter_id" id="exampleFormControlSelect1">
                        @foreach ($dokters as $dokter)
                            @if (old('dokter_id') == $dokter->id)
                                <option value="{{ $dokter->id }}" selected>{{ $dokter->nmdokter }} -
                                    {{ $dokter->ahli->bidangahli }}</option>
                            @else
                                <option value="{{ $dokter->id }}">{{ $dokter->nmdokter }}-
                                    {{ $dokter->ahli->bidangahli }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-11 info-panel">
            <div class="row">
                <h4 class="text-center mb-3">DOKUMEN WAJIB DI UPLOAD</h4>
                <div class="form-group mb-3">
                    <label class="fw-bold" for="file_asuransi"><b>Dokumen Asuransi</b></label><span
                        class="text-danger">&#42</span><br>
                    <span class="fw-light fs-6">Silakan upload dokumen permohonan resume medis dari pihak asuransi</span>

                    <input type="file" name="file_asuransi" id="file_asuransi"
                        class="form-control @error('file_asuransi') is-invalid @enderror">
                    @error('file_asuransi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bold" for="file_suratkuasa"><b>Surat Kuasa</b></label><span>(opsional)</span><br>
                    <span class="fw-light fs-6">Silakan upload surat keterangan penunjukan kewenangan penerima informasi
                        kondisi pasien(.pdf)</span>
                    <input type="file" name="file_suratkuasa" id="file_suratkuasa"
                        class="form-control @error('file_suratkuasa') is-invalid @enderror">
                    @error('file_suratkuasa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary tombol">Submit</button>
            <a href="/dashboard" class="btn btn-libk">Kembali</a>
            </form>
        </div>
    </div>
@endsection
