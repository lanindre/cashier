<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggan as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->nomor_telepon }}</td>
                <td>{{ $p->alamat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<style>
    /* Style untuk judul tabel */
    #data {
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #data th {
        background-color: #f2f2f2;
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    #data td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    /* Style untuk baris ganjil */
    #data tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    /* Style untuk baris genap */
    #data tbody tr:nth-child(even) {
        background-color: #ffffff;
    }
</style>

