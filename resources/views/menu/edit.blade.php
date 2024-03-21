<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jenis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="menu" class="form-edit">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Nama Menu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" value=""
                                placeholder="Nama menu" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Harga</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="harga" value=""
                                placeholder="Harga" name="harga">
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Image</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="image" value=""
                                name="image">
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="deskripsi" value=""
                                placeholder="Deskripsi" name="deskripsi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_id" class="col-sm-4 col-form-label">Nama Jenis</label>
                        <div class="col-sm-8">
                            <select  class="form-control" name="jenis_id" id="jenis_id">
                                <option selected disabled>Nama Jenis</option>
                                @foreach ($jenis as $j => $label)
                                    <option value="{{ $j }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" class="form-control" id="inputEmail13" placeholder="Jenis Barang"
                                name="produk_id"> --}}
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
</div>
