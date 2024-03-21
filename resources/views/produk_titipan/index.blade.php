@extends('template.layout')

@push('style')
@endpush

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Produk Titipan</h3>

                {{-- <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div> --}}
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times</span>
                        </button>
                    </div>
                @endif
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ProduktitipanFormModal">
                    <i class="typcn typcn-plus"></i> 
                    Tambah Data
                </button>
                <a href="{{route('Z')}}" class="btn btn-success">
                    <i class=" typcn typcn-download"></i> Export XSLX
                  </a>
                  <a href="{{route('Y')}}" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Export PDF
                  </a>
                  <button type="button" class="btn btn-warning btn-import" data-toggle="modal" data-target="#import" enctype="multipart/form-data">
                    <i class=" typcn typcn-document-add"></i> 
                    IMPORT
                </button>
                <div class="mt-3">
                    @include('produk_titipan.data')
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            @include('produk_titipan.form')
            @include('produk_titipan.edit')
            @include('produk_titipan.import')
    </section>
@endsection
@push('script')
    <script>
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-danger').slideUp(500)
        })

        $(function() {

            // dialog hapus data
            $('.btn-delete').on('click', function(e) {
                let nama = $(".produk_titipan" + $(this).attr('data-id')).text()
                console.log(nama)
                Swal.fire({
                    icon: 'error',
                    title: 'Hapus Data',
                    html: `Apakah data akan dihapus?`,
                    confirmButtonText: 'Ya',
                    denyButtonText: 'Tidak',
                    showDenyButton: true,
                    focusConfirm: false
                }).then((result) => {
                    if (result.isConfirmed) $(e.target).closest('form').submit()
                    else swal.close()
                })
            })
        })
    </script>
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk menghitung harga jual otomatis saat input harga beli diubah
             $('#harga_beli').on('input', function() {
            var hargaBeli = $(this).val();
            var keuntungan = hargaBeli * 1.7;
            var hargaJual = Math.ceil(keuntungan / 500) * 500;
            $('#harga_jual').val(hargaJual);
            });

            $('#editModal').on('show.bs.modal', function(e) {
                console.log('oke')
                let button = $(e.relatedTarget)
                let jsonObject = JSON.stringify(button.data('json'))
                let items = JSON.parse(jsonObject)
                console.log(items)
                $('#nama_produk').val(items.nama_produk)
                $('#nama_supplier').val(items.nama_supplier)
                $('#harga_beli').val(items.harga_beli)
                $('#harga_jual').val(items.harga_jual)
                $('#stok').val(items.stok)
                $('#keterangan').val(items.keterangan)
                $('.form-edit').attr('action', `/produk_titipan/${items.id}`)
            })
        });

    </script>
   <script>
   function enableEditStok(elementId, productId) {
    const element = document.getElementById(elementId);

    // Simpan nilai awal stok
    const oldValue = element.innerText;

    // Buat input textfield
    const inputField = document.createElement('input');
    inputField.type = 'number';
    inputField.value = oldValue;

    // Fokuskan input field
    inputField.focus();

    // Atur ulang elemen dengan input field
    element.innerHTML = '';
    element.appendChild(inputField);

    // Tambahkan event listener untuk menangkap tombol Enter
    inputField.addEventListener('keyup', function (event) {
        if (event.key === 'Enter') {
            // Ambil nilai yang diinput
            const newValue = inputField.value;

            // Kirim data baru ke server menggunakan AJAX
            updateStokToDatabase(productId, newValue);

            // Kembalikan elemen ke tampilan awal setelah nilai diupdate
            element.innerHTML = newValue;

            // Nonaktifkan event listener setelah selesai
            inputField.removeEventListener('keyup', this);
        }
    });
    }

   function updateStokToDatabase(Id, newValue) {
    $.ajax({
        type: 'PUT',
        url: `/produk_titipan/${Id}/update-stok`,
        data: {
            stok: newValue,
            _token: '{{ csrf_token() }}',
        },
        success: function (response) {
            console.log('Stok berhasil diperbarui:', response);
            // Tambahkan logika lain yang diperlukan setelah berhasil memperbarui stok
        },
        error: function (error) {
            console.error('Gagal memperbarui stok:', error);
            // Tambahkan logika lain yang diperlukan jika terjadi kesalahan
        }
    });
}
</script>
@endpush
