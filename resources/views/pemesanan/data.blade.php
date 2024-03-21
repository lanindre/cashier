<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nomor Meja</th>
            <th>Tanggal Pemesanan</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Nama Pemesan</th>
            <th>Jumlah Pelanggan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemesanan as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->meja_id }}</td>
                <td>{{ $p->tanggal_pemesanan }}</td>
                <td>{{ $p->jam_mulai }}</td>
                <td>{{ $p->jam_selesai }}</td>
                <td>{{ $p->nama_pemesan }}</td>
                <td>{{ $p->jumlah_pelanggan }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-edit" data-toggle="modal"
                        data-target="#editModal"data-mode="edit" data-id="{{ $p->id }}"
                        data-json="{{ json_encode($p) }}" data-nama="{{ $p->meja_id }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form action="{{ route('pemesanan.destroy', $p->id) }}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                </td>
                </form>
            </tr>
        @endforeach
    </tbody>
</table>
