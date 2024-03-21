<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No.</th>
            <th>NIP</th>
            <th>NIK</th>
            <th>Nama Karyawan</th>
            <th>Foto</th>
            <th>NO. Telp</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($karyawan as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nip }}</td>
                <td>{{ $p->nik }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->foto }}</td>
                <td>{{ $p->telepon }}</td>
                <td>{{ $p->alamat }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-edit" data-toggle="modal"
                        data-target="#editModal"data-mode="edit" data-id="{{ $p->id }}"
                        data-json="{{ json_encode($p) }}" data-nama="{{ $p->nama }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form action="{{ route('karyawan.destroy', $p->id) }}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                </td>
                </form>
            </tr>

            <div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="formImportLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formImportLabel">Import Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Pastikan formulir memiliki atribut enctype untuk mengizinkan unggahan file -->
                            <form method="post" action="{{ route('bebek') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="import" class="form-control" required>
                                <br>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        @endforeach
    </tbody>
</table>
