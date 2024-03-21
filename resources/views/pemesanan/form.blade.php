<div class="modal fade" id="PemesananFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Jenis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action={{ route('pemesanan.store') }}>
                    @csrf
                    <div class="form-group row">
                        <label for="Pemesanan" class="col-sm-4 col-form-label">Nomor Meja</label>
                        <div class="col-sm-8">
                            <select name="meja_id" id="">
                                @foreach ($meja as $m => $label)
                                    <option value="{{ $m }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" class="form-control" id="inputEmail13" placeholder="Jenis Barang"
                                name="produk_id"> --}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Tanggal Pemesanan</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="inputEmail13" value=""
                                placeholder="Tanggal Pemesanan" name="tanggal_pemesanan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Jam Mulai</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="inputEmail13" value=""
                                placeholder="Jam Mulai" name="jam_mulai">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Jam Selesai</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="inputEmail13" value=""
                                placeholder="Jam Selesai" name="jam_selesai">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Nama Pemesan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEmail13" value=""
                                placeholder="Nama Pemesan" name="nama_pemesan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Jumlah Pelanggan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEmail13" value=""
                                placeholder="Jumlah Pelanggan" name="jumlah_pelanggan">
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
