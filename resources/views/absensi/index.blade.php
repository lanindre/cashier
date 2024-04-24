@extends('template.layout')

@push('style')
@endpush

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Absensi</h3>

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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">
                    <i class="typcn typcn-plus"></i>
                    Tambah Data
                </button>
                <a href="{{ route('l') }}" class="btn btn-success">
                    <i class="typcn typcn-download"></i> Export XSLX
                </a>
                <a href="{{ route('m') }}" class="btn btn-danger">
                    <i class=" typcn typcn-export"></i> Export PDF
                </a>
                <button type="button" class="btn btn-warning btn-import" data-toggle="modal" data-target="#import" enctype="multipart/form-data">
                    <i class=" typcn typcn-document-add"></i> 
                    IMPORT
                </button>
                <div class="mt-3">
                    @include('absensi.data')
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            @include('absensi.form')
            @include('absensi.edit')
            @include('absensi.import')
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
                let nama = $(".absensi" + $(this).attr('data-id')).text()
                console.log(nama)
                Swal.fire({
                    icon: 'error',
                    title: 'Hapus Data',
                    html: `Apakah data ${nama} akan dihapus?`,
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
        // $(document).ready(function() {

        //     $('#editModal').on('show.bs.modal', function(e) {
        //         console.log('oke')
        //         let button = $(e.relatedTarget)
        //         let jsonObject = JSON.stringify(button.data('json'))
        //         let items = JSON.parse(jsonObject)
        //         console.log(items)
        //         $('#namaKaryawan').val(items.namaKaryawan)
        //         $('#tanggalMasuk').val(items.tanggalMasuk)
        //         $('#waktuMasuk').val(items.waktuMasuk)
        //         $('#status').val(items.status)
        //         $('#waktuKeluar').val(items.waktuKeluar)
        //         $('.form-edit').attr('action', `/absensi/${items.id}`)
        //     })
        // })

        $('#modalEdit').on('show.bs.modal', function(e) {
            console.log(btn.data('mode'))
        // const btn = $(e.relatedTarget)
        // const mode = btn.data('mode')
        // const namaKaryawan = btn.data('nama_karyawan')
        // const tanggalMasuk = btn.data('tanggal_masuk')
        // const waktuMasuk = btn.data('waktu_masuk')
        // const status = btn.data('status')
        // const waktuKeluar = btn.data('waktu_meluar')
        // const id = btn.data('id')
        // const modal = $(this)
        // console.log(namaKaryawan)
        // if (mode === 'edit') {
        //     modal.find('.modal-title').text('Edit Data Absensi')
        //     modal.find('#namaKaryawan').val(namaKaryawan)
        //     modal.find('#tanggalMasuk').val(tanggalMasuk)
        //     modal.find('#waktuMasuk').val(waktuMasuk)
        //     modal.find('#status').val(status)
        //     modal.find('#waktuKeluar').val(waktuKeluar)
        //     modal.find('.modal-body form').attr('action', '{{ url('absensi') }}/' + id)
        //     modal.find('#method').html('@method('PATCH')')
        //     console.log(name)
        // } else {
        //     modal.find('.modal-title').text('Input Data Absensi')
        //     modal.find('#namaKaryawan').val('')
        //     modal.find('#tanggalMasuk').val('')
        //     modal.find('#waktuMasuk').val('')
        //     modal.find('#status').val('')
        //     modal.find('#waktuKeluar').val('')
        //     modal.find('#method').html('')
        //     modal.find('.modal-body form').attr('action', '{{ url('absensi') }}')
        // }
    })

    </script>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         $(document).ready(function() {
        $('#tbl-absensi tbody').on('dblclick', 'td', function() {
            var column_num = parseInt($(this).index()) + 1;
            var row_num = parseInt($(this).closest('tr').find('button[data-mode=edit]').data('id'));
            var col_name = $(this).closest('table').find('th').eq(column_num - 1).text();
            if (col_name === 'Status') {
                var current_data = $(this).text();
                $(this).html('<select class="form-control select-status" data-id="' + row_num + '">' +
                    '<option value="Masuk">Masuk</option>' +
                    '<option value="Izin">Izin</option>' +
                    '<option value="Cuti">Cuti</option>' +
                    '</select>');
                $(this).find('.select-status').val(current_data);

            }
        });

        $('#tbl-absensi tbody').on('change', '.select-status', function() {
            var new_status = $(this).val();
            var row_num = $(this).data('id');
            var valid_statuses = ['Masuk', 'Izin', 'Cuti']; // Daftar status yang valid

            if (!valid_statuses.includes(new_status)) {
                var confirm_custom_status = confirm('Status tidak valid. Apakah Anda ingin menggunakan status kustom?');
                if (confirm_custom_status) {
                    var input_status = prompt('Masukkan status baru:');
                    if (input_status !== null && input_status.trim() !== '') {
                        new_status = input_status.trim();
                    } else {
                        $(this).val($(this).data('prev-status')); // Kembalikan ke status sebelumnya jika status kustom tidak valid
                        return;
                    }
                } else {
                    $(this).val($(this).data('prev-status')); // Kembalikan ke status sebelumnya jika tidak ingin menggunakan status kustom
                    return;
                }
            }

            // Send the new status to the backend using AJAX
            $.ajax({
                type: "POST",
                url: "update-status",
                data: {
                    "_token": "{{ csrf_token() }}",
                    row_num: row_num,
                    new_status: new_status
                },
                success: function(response) {
                    // Handle the response
                    console.log(response);
                },
                error: function(error) {
                    // Handle the error
                    console.log(error);
                }
            });

            $(this).parent().text(new_status);
        });


    });
    </script>
    
@endpush
