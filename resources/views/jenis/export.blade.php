<table id="data">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Jenis</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->name }}</td>
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



