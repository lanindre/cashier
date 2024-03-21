<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Jenis</th>
        </tr>
    </thead>
    <tbody>
        @foreach($karyawan as $k)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table