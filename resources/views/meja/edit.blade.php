<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Meja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="meja" class="form-edit">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nomor Meja</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nomor_meja" value="" name="nomor_meja">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Kapasitas</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kapasitas" value="" name="kapasitas">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="status" value="" name="status">
                        </div>
                    </div
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>
