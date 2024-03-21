<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nomor Meja</th>
            <th>Kapasitas</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($meja as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nomor_meja }}</td>
                <td>{{ $p->kapasitas }}</td>
                <td>{{ $p->status }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-edit" data-toggle="modal"
                        data-target="#editModal"data-mode="edit" data-id="{{ $p->id }}"
                        data-json="{{ json_encode($p) }}" data-nama="{{ $p->name }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form action="{{ route('meja.destroy', $p->id) }}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                </td>
                </form>
            </tr>
        @endforeach
    </tbody>
</table>
