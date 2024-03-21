<div class="modal fade" id="jenisFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="post" action={{ route('jenis.store') }}>
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Nama Jenis</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEmail13" value=""
                                placeholder="Nama Jenis" name="name">
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="Jenis" class="col-sm-4 col-form-label">Nama Ketegori</label>
                        <div class="col-sm-8">
                            <select name="kategori_id" id="">
                                @foreach ($kategori as $k => $label)
                                    <option value="{{ $k }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control" id="inputEmail13" placeholder="Jenis Barang"
                                name="produk_id">
                        </div>
                    </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
