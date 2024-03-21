<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>nip</th>
            <th>nik</th>
            <th>nama</th>
            <th>jenis_kelamin</th>
            <th>tempat_lahir</th>
            <th>tanggal_lahir</th>
            <th>telepon</th>
            <th>agama</th>
            <th>status_nikah</th>
            <th>alamat</th>
            <th>foto</th>
        </tr>
    </thead>
    <tbody>
        @foreach($karyawan as $k)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nip}}</td>
            <td>{{ $p->nik}}</td>
            <td>{{ $p->nama}}</td>
            <td>{{ $p->jenis_kelamin}}</td>
            <td>{{ $p->tempat_lahir}}</td>
            <td>{{ $p->tanggal_lahir}}</td>
            <td>{{ $p->telepon}}</td>
            <td>{{ $p->agama}}</td>
            <td>{{ $p->status_nikah}}</td>
            <td>{{ $p->alamat}}</td>
            <td>{{ $p->foto}}</td>
        </tr>
        @endforeach
    </tbody>
</table