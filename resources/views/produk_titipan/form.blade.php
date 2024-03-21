<div class="modal fade" id="ProduktitipanFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="produk_titipan">
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama Produk</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="" name="nama_produk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama Supplier</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="" name="nama_supplier">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Harga Beli</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" class="form-control" id="harga_beli" placeholder="harga_beli"
                            name="harga_beli" oninput="hitungHargaJual()">
                    </div>
                    <div class="input-group mb-3">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Harga Jual</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" class="form-control" id="harga_jual" placeholder="harga_jual"
                            name="harga_jual" readonly>
                    </div>
                    <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Stok</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="" name="stok">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="" name="keterangan">
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

<script>
    function hitungHargaJual() {
        var hargaBeli = parseFloat(document.getElementById('harga_beli').value);
        var keuntungan = hargaBeli * 1.7;
        var hargaJual = Math.ceil(keuntungan / 500) * 500;
        document.getElementById('harga_jual').value = hargaJual.toFixed(2);
    }
</script>