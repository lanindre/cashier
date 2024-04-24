{{-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="absensi" class="form-edit">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="namaKaryawan" value="" name="namaKaryawan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggalMasuk" value="" name="tanggalMasuk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Masuk</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="waktuMasuk" value="" name="waktuMasuk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <select id="status" placeholder="Status" name="status"
                            class="col-sm-8 form-control">
                            <option selected disabled>Pilih Status</option>
                            <option value="masuk">Masuk</option>
                            <option value="cuti">Cuti</option>
                            <option value="izin">Izin</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="waktuKeluar" class="col-sm-4 col-form-label">Waktu Keluar</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="waktuKeluar" value=""
                                name="waktuKeluar">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
