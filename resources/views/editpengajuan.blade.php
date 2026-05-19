@extends('layouts.main')
@section('home')
       <div class="row">
            <div class="col-md-12 mt-5 mb-5 text-center">
                <h2>UBAH DATA PENGAJUAN</h2>
            </div>
       </div>

       <div class="row justify-content-center mb-5">
        <div class="col-11 info-panel mb-5">
              <form method="POST" action="/pengajuans/{{ $pengajuan->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                  
                <div class="row">
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                   <a href="/dashboard"><button type="button" class="btn-close" aria-label="Close"></button></a>
                  </div>
                  <h4 class="text-center mb-3">DATA DIRI PEMOHON</h4>
                  <div class="form-group col-6 mb-3">
                    <label for="nmpemohon">Nama Pemohon</label>
                    <input type="text" name="nmpemohon" class="form-control radius @error('nmpemohon') is-invalid @enderror" value="{{ old('nmpemohon', $user->name) }}" readonly>
                    @error ('nmpemohon')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control radius @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" readonly>
                    @error ('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label for="notlp">Nomor Telepon</label>
                    <input type="number" name="notlp" class="form-control radius @error('notlp') is-invalid @enderror" value="{{ old('notlp', $user->no_tlp) }}" readonly>
                    @error ('notlp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label for="statushubungan">Hubungan Dengan Pasien/Pemegang Polis</label><br>
                  <select class="form-control radius" name="hubungan" id="exampleFormControlSelect1">
                    <option value="Pemegang Polis" 
                    @if ($pengajuan->hubungan == "Pemegang Polis")
                    selected
                    @endif>Pemegang Polis</option>
                    <option value="Pemegang surat kuasa"
                    @if ($pengajuan->hubungan == "Pemegang surat kuasa")
                        selected
                    @endif>Pemegang surat kuasa (yang diberikan kewenangan)</option>
                  </select>
                </div>
                </div>
          </div>
          
          <div class="col-11 info-panel mb-5">
                <div class="row">
                  <h4 class="text-center mb-3">DATA DIRI PASIEN</h4>
                  <div class="form-group col-6 mb-3">
                    <label for="no_rm">Nomor Rekam Medis Pasien</label>
                    <input type="text" name="no_rm" class="form-control radius @error('no_rm') is-invalid @enderror" value="{{ old('no_rm', $pengajuan->no_rm) }}">
                    @error ('no_rm')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label for="nm_pasien">Nama Pasien</label>
                    <input type="text" name="nm_pasien" class="form-control radius  @error('nm_pasien') is-invalid @enderror" value="{{ old('nm_pasien', $pengajuan->nm_pasien) }}">
                    @error ('nm_pasien')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control radius @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir', $pengajuan->tgl_lahir) }}">
                    @error ('tgl_lahir')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label for="tgl_rawat">Tanggal Dirawat</label>
                    <input type="date" name="tgl_rawat" class="form-control radius @error('tgl_rawat') is-invalid @enderror" value="{{ old('tgl_rawat', $pengajuan->tgl_rawat) }}">
                    @error ('tgl_rawat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label for="nm_asuransi">Nama Asuransi</label>
                    <input type="text" name="nm_asuransi" class="form-control radius @error('nm_asuransi') is-invalid @enderror" value="{{ old('nm_asuransi', $pengajuan->nm_asuransi) }}">
                    @error ('nm_asuransi')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group col-6 mb-3">
                    <label class="fw-bold" for="statushubungan">Nama Dokter</label><br>
                    <select class="form-select radius" name="dokter_id" id="exampleFormControlSelect1">
                    @foreach ($dokters as $dokter)
                    @if (old('dokter_id',$pengajuan->dokter_id) == $dokter->id)
                      <option value="{{ $dokter->id }}" selected>{{ $dokter->nmdokter}} - {{ $dokter->ahli->bidangahli }}</option>
                    @else
                      <option value="{{ $dokter->id }}">{{ $dokter->nmdokter}}- {{ $dokter->ahli->bidangahli }}</option>
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
                <label for="file_asuransi"><b>Dokumen Asuransi</b></label><br>
                <span>Silakan upload dokumen permohonan resume medis dari pihak asuransi</span>
                <input type="hidden" name="oldFile1" value="{{ $pengajuan->file_asuransi }}">
                @if ($pengajuan->file_asuransi)
                  <a class="btn btn-success col-sm-3 d-block mb-2" target="_blank" href="{{ asset('storage/' .$pengajuan->file_asuransi) }}"><i class="fa-solid fa-file"></i> File Asuransi Anda</a>
                @endif
                  <input type="file" name="file_asuransi" id="file_asuransi" class="form-control @error('file_asuransi') is-invalid @enderror">
                @error ('file_asuransi')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="file_suratkuasa"><b>Surat Kuasa</b></label><br>
                <input type="hidden" name="oldFile2" value="{{ $pengajuan->file_suratkuasa }}">
                <span>Silakan upload surat keterangan penunjukan kewenangan penerima informasi kondisi pasien (jika pemohon merupakan pihak ketiga)(.pdf)</span>
                @if ($pengajuan->file_suratkuasa)
                  <a class="btn btn-success col-sm-3 d-block mb-2" target="_blank" href="{{ asset('storage/' .$pengajuan->file_suratkuasa) }}"><i class="fa-solid fa-file"></i> File durat Kuasa Anda</a>
                @endif
                  <input type="file" name="file_suratkuasa" id="file_suratkuasa" class="form-control @error('file_suratkuasa') is-invalid @enderror">
                @error ('file_suratkuasa')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
          </div>
              <button type="submit" class="btn btn-primary tombol">Update</button>
            </form>
          </div>
      </div>
@endsection