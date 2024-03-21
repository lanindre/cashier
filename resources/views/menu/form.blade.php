<div class="modal fade" id="menuFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action={{ route('menu.store') }}>
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Nama Menu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEmail13" value=""
                                placeholder="Nama Menu" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Harga</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEmail13" value=""
                                placeholder="Harga" name="harga">
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <label for="image" class="col-sm-4 col-form-label">image</label> 
                        <div class="col-sm-8"> 
                            <input type="file" class="form-control" id="image" placeholder="image" 
                                name="image"> 
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEmail13" value=""
                                placeholder="Deskripsi" name="deskripsi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_id" class="col-sm-4 col-form-select">Jenis</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="jenis_id" name="jenis_id" required>
                                <option selected disabled>Nama Jenis</option>
                                @foreach ($jenis as $j => $label)
                                    <option value="{{ $j }}">{{ $label }}</option>
                                @endforeach
                            </select>
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
