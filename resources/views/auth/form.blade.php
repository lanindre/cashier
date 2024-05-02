<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="register">
                    <div id="method"></div>
                    @csrf
                    <div class="form-group row">
                        <div class="mb-3">
                            <label for="name" class="col-sm-4 col-form-label">Nama </label>
                            <div class="">
                                <input type="text" class="form-control" id="name" name='name'>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="">
                                <input type="text" class="form-control" id="email" name='email'>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="">
                                <input type="password" class="form-control" id="password" name='password'>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="jenis_id" class="form-label">Level</label>

                            <select class="form-select" name="level" id="level">
                                <option selected disabled>Pilih Level</option>
                                <option value="1">1.Admin</option>
                                <option value="2">2.Kasir</option>
                            </select>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
        </div>
    </div>
    </form>
</div>
</div>
{{-- import --}}
<div class="modal fade" id="formImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Absen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ url('anjai') }}" enctype="multipart/form-data">
                    <div id="method"></div>
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jenis">File Excel</label>
                            <input type="file" name="import" id="import">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Upload</button>

            </div>
        </div>
    </div>
</div>