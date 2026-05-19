@extends('layouts.main')
@section('home')
       <div class="row">
            <div class="col-md-12 mt-5 mb-5 text-center">
                <h2>PENGAJUAN ANDA</h2>
            </div>
       </div>

       <div class="row justify-content-center">
         @if(session()->has('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
           {{ session('success') }}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         @endif
        <div class="col-12 info-panel">
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="/dashboard"><button type="button" class="btn-close" aria-label="Close"></button></a>
           </div>
            <table class="table table-striped">
                <thead class="text-center">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nomer Rekam Medis</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    <th scope="col">Tanggal Pengajuan</th>
                    <th scope="col">Detail</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  @foreach ($pengajuans as $pengajuan)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $pengajuan->no_rm }}</td>
                    <td>{{ $pengajuan->nm_pasien }}</td>
                    <td>
                      <span 
                      @if ($pengajuan->status == "Diterima")
                      class="badge rounded-pill bg-info text-white"  
                      @elseif ($pengajuan->status == "Dokumen Selesai")
                      class="badge rounded-pill bg-success"
                      @else 
                      class="badge rounded-pill bg-warning text-dark" 
                      @endif 
                      >
                        {{ $pengajuan->status }}</span>
                    
                    </td>
                    <td>{{ $pengajuan->created_at->diffForHumans() }}</td>
                    <td>{{ $pengajuan->created_at->format('d-m-Y') }}</td>
                    <td>
                      @if ($pengajuan->status == "Diterima")
                      <a href="/pengajuans/{{ $pengajuan->id }}" class="badge bg-info">
                        <i class="fa-solid fa-circle-info text-center"></i>
                      </a>
                      @elseif ($pengajuan->status == "Dokumen Selesai")
                      <a href="/pengajuans/{{ $pengajuan->id }}" class="badge bg-info">
                        <i class="fa-solid fa-circle-info text-center"></i>
                      </a>
                      @else 
                      <a href="/pengajuans/{{ $pengajuan->id }}" class="badge bg-info">
                        <i class="fa-solid fa-circle-info text-center"></i>
                      </a>
                      <a href="/pengajuans/{{ $pengajuan->id }}/edit" class="badge bg-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>      
                      <form action="/pengajuans/{{ $pengajuan->id }}" method="POST" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash-can"></i></button>
                      </form>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
      </div>
@endsection
