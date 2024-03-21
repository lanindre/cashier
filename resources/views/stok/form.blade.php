<div class="modal fade" id="menuFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action={{ route('stok.store') }}>
                    @csrf
                    <div class="form-group row">
                        <label for="Menu" class="col-sm-4 col-form-select"> Nama Menu</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="menu_id" id="menu_id" required>
                                @foreach ($menu as $m => $label)
                                    <option value="{{ $m }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" class="form-control" id="inputEmail13" placeholder="Jenis Barang"
                                name="produk_id"> --}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Jumlah</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEmail13" value=""
                                placeholder="Jumlah" name="jumlah">
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
