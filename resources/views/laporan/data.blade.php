<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Nama Menu</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach($laporan as $key => $trx)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $trx->tanggal }}</td>
            <td>{{ $trx->nama_menu }}</td>
            <td>{{ $trx->total_harga }}</td>
        </tr>
    @endforeach
    </tbody>
</table>