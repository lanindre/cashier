<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Faktur</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    padding: 20px;
}

h2 {
    color: #333;
}

h5 {
    color: #666;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

tfoot td {
    font-weight: bold;
}
    </style>
</head>
<body>
    <h2>Bakso Coffee</h2>
<h5>Jl. Kapan Haikyuu Tayang di Indo No.10, 030510</h5>
<hr>
<div style="display: flex; justify-content: space-between;">
    <h5>No.Faktur : {{ $transaksi->id }}</h5>
    <h5>Tanggal : {{ $transaksi->tanggal }}</h5>
</div>
    <table border="0">
        <thead>
            <tr>
                <td>Qty</td>
                <td>Item</td>
                <td>Harga</td>
                {{-- <td>Deskripsi</td> --}}
                <td>Total</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->detailTransaksi as $item)
            <tr>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->menu->name }}</td>
                <td>{{ number_format($item->menu->harga, 0, ",", ".") }}</td>
                {{-- <td>{{ $item->deskripsi }}</td> --}}
                <td>{{ number_format($item->subtotal, 0, ",", ".") }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>{{ number_format($transaksi->total_harga, 0, ",", ".") }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>