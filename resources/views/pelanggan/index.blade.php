@extends('template.layout')

@push('style')
@endpush

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pelanggan</h3>

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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PelangganFormModal">
                    <i class="typcn typcn-plus"></i> 
                    Tambah Data
                </button>
                <a href="{{route('J')}}" class="btn btn-success">
                    <i class=" typcn typcn-download"></i> Export XSLX
                  </a>
                  <a href="{{route('K')}}" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Export PDF
                  </a>
                  <button type="button" class="btn btn-warning btn-import" data-toggle="modal" data-target="#import" enctype="multipart/form-data">
                    <i class=" typcn typcn-document-add"></i> 
                    IMPORT
                </button>
                <div class="mt-3">
                    @include('pelanggan.data')
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            @include('pelanggan.form')
            @include('pelanggan.edit')
            @include('pelanggan.import')
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
                let nama = $(".pelanggan" + $(this).attr('data-id')).text()
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

            $('#editModal').on('show.bs.modal', function(e) {
                console.log('oke')
                let button = $(e.relatedTarget)
                let jsonObject = JSON.stringify(button.data('json'))
                let items = JSON.parse(jsonObject)
                console.log(items)
                $('#name').val(items.name)
                $('#email').val(items.email)
                $('#nomor_telepon').val(items.nomor_telepon)
                $('#alamat').val(items.alamat)
                $('.form-edit').attr('action', `/pelanggan/${items.id}`)
            })
        })
    </script>
@endpush
