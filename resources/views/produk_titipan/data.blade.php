<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Nama Supplier</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk_titipan as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->nama_supplier }}</td>
                <td>{{ $p->harga_beli }}</td>
                <td>{{ $p->harga_jual }}</td>
                <td>
                    <span class="editable-stok" id="stok{{ $p->id }}" ondblclick="enableEditStok('stok{{ $p->id }}')">
                        {{ $p->stok }}
                    </span
                </td>
                <td>{{ $p->keterangan }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-edit" data-toggle="modal"
                        data-target="#editModal"data-mode="edit" data-id="{{ $p->id }}"
                        data-json="{{ json_encode($p) }}" data-nama="{{ $p->nama_produk }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form action="{{ route('produk_titipan.destroy', $p->id) }}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                </td>
                </form>
            </tr>
        @endforeach
    </tbody>
</table>
