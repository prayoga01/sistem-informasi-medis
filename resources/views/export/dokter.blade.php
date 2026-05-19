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
        <th>NIP</th>
        <th>Nama Dokter</th>
        <th>Bidang Ahli</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dokters as $dokter)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $dokter->kd_dokter }}</td>
            <td>{{ $dokter->nmdokter }}</td>
            <td>{{ $dokter->ahli->bidangahli }}</td>
        </tr>
    @endforeach
    </tbody>
</table>