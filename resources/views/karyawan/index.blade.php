@extends('template.layout')

@push('style')
@endpush

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Karyawan</h3>

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

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#karyawanFormModal">
                    <i class="typcn typcn-plus"></i>
                    Tambah Data
                </button>
                <a href="{{ route('ikan') }}" class="btn btn-success">
                    <i class=" typcn typcn-download"></i> Export XSLX
                </a>
                <a href="{{ route('hiu') }}" class="btn btn-danger">
                    <i class=" typcn typcn-export"></i> Export PDF
                </a>
                <button type="button" class="btn btn-warning btn-import" data-toggle="modal" data-target="#import" enctype="multipart/form-data">
                    <i class=" typcn typcn-document-add"></i> 
                    IMPORT
                </button>


                <div class="mt-3">
                    @include('karyawan.data')
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            @include('karyawan.import')
            @include('karyawan.form')
            @include('karyawan.edit')
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
                let nama = $(".karyawan" + $(this).attr('data-id')).text()
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
                $('#nip').val(items.nip)
                $('#nik').val(items.nik)
                $('#nama').val(items.nama)
                $('#jenis_kelamin').val(items.jenis_kelamin)
                $('#tempat_lahir').val(items.tempat_lahir)
                $('#tanggal_lahir').val(items.tanggal_lahir)
                $('#telepon').val(items.telepon)
                $('#agama').val(items.agama)
                $('#status_nikah').val(items.status_nikah)
                $('#alamat').val(items.alamat)
                // $('#foto').val(items.foto)
                $('.form-edit').attr('action', `/karyawan/${items.id}`)
            })
        })
    </script>
@endpush
