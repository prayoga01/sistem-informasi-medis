<table>
    <thead>
        <tr>
            <th colspan="3" rowspan="2"></th>
            <th colspan="5" style="text-align: center;"><strong>RSUD WANGAYA KOTA DENPASAR</strong></th>
        </tr>
        <tr>
            <th></th>
        </tr>
        <tr>
            <th></th>
        </tr>
    <tr>
        <th>No</th>
        <th>Nama Pemohon</th>
        <th>Nama Pasien</th>
        <th>No Rekam Medis</th>
        <th>Nama Asuransi</th>
        <th>Status Pengajuan</th>
        <th>Status Pengambilan</th>
        <th>Nama Pengambil</th>
        <th>Tanggal Pengambilan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pengajuans as $pengajuan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pengajuan->user->name }}</td>
            <td>{{ $pengajuan->nm_pasien }}</td>
            <td>{{ $pengajuan->no_rm }}</td>
            <td>{{ $pengajuan->nm_asuransi }}</td>
            <td>{{ $pengajuan->status }}</td>
            <td>{{ $pengajuan->statuspengambilan }}</td>
            <td>{{ $pengajuan->nmpengambil }}</td>
            <td>{{ $pengajuan->tgl_pengambilan }}</td>
        </tr>
    @endforeach
    </tbody>
</table>