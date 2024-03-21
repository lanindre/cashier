<div class="modal fade" id="karyawanFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="karyawan" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">NIP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="" name="nip">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">NIK</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="" name="nik">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="" name="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <select placeholder="Kategori karyawan" name="jenis_kelamin" class="col-sm-7 form-control">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="" name="tempat_lahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" value="" name="tanggal_lahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Telepon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="" name="telepon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Agama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="" name="agama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status_nikah" class="col-sm-4 col-form-label">Status Nikah</label>
                        <select placeholder="Kategori karyawan" name="status_nikah" class="col-sm-7 form-control">
                            <option selected disabled>Pilih Status Nikah</option>
                            <option value="belum nikah">Belum Nikah</option>
                            <option value="nikahh">Nikah</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="" name="alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">foto</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" value="" name="foto"
                                id="foto">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
