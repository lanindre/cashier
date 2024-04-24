<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Image</th>
            <th>Deskripsi</th>
            <th>Nama Jenis</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menu as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->name }}</td>
                <td>Rp.{{ $p->harga }}</td>
                <td><img src="{{ asset('storage/'. $p->image) }}" alt="image" style="width: 60px; height: 60px;"></td>
                {{-- <td>{{ $p->image }}</td> --}}
                <td>{{ $p->deskripsi }}</td>
                <td>{{ $p->jenis->name }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-edit" data-toggle="modal"
                        data-target="#editModal"data-mode="edit" data-id="{{ $p->id }}"
                        data-json="{{ json_encode($p) }}" data-nama="{{ $p->name }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form action="{{ route('menu.destroy', $p->id) }}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                </td>
                </form>
            </tr>
        @endforeach
    </tbody>
</table>
