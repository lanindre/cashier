@extends('template.layout')

@push('style')
@endpush

@section('content')
    <section class="content">
        <main id="main" class="main">

            <div class="container" style="display: flex; ">
                <!-- Default box -->
                <div class="card1" style="width: 800px;">
                    <div class="pagetitle">
                        <h1>Pemesanan</h1>

                    </div>

                    {{-- <label for="nama_pemesan" class="col-sm-4 col-form-label">Nama pelanggan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_pemesan" name='nama_pemesan'>
                    </div> --}}
                    <div class="item-sidebar">
                        <div class="menu-container px-1" style="overflow: hidden">
                            @foreach ($jenis as $j)
                                <h3>{{ $j->name }}</h3>
                                <div class="row px-3 ">
                                    @foreach ($j->menu as $menu)
                                        <div class="col-md-3 rounded mx-1 my-2 menu-item" data-id="{{ $menu->id }}" data-nama="{{ $menu->name }}" data-harga="{{ $menu->harga }}" style="background-color: #e4fdf9">
                                            <div class="d-flex flex-column align-items-center justify-content-between" style="height: 100%;">
                                                <img src="{{ asset('storage/'.$menu->image) }}" class="ms-auto mt-2 img-fluid rounded-circle" alt="" style="width: 80px; height: 80px; border-radius: 50%;">
                                                <h4 class="text-center mt-3 menu">{{ $menu->name }}</h4>
                                                <p class="text-center">Rp. <span>{{ $menu->harga }}</span></p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="item-content col-md-4">
                    <h1>Order</h1>
                    <ul class="ordered-list">

                    </ul>
                    Total Bayar : <h2>Rp. <span id="total"></span></h2>
                    <button class="btn btn-primary col-md-3" id="btn-bayar">Bayar</button>
                </div>
            </div>
            </div>
            <footer class="fixed bottom"></footer>
        </main><!-- End #main -->
    </section>
@endsection
@push('script')
    {{-- <script>
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-danger').slideUp(500)
        })

        $(function() {

            // dialog hapus data
            $('.btn-delete').on('click', function(e) {
                let nama = $(".pemesanan" + $(this).attr('data-id')).text()
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
                $('#meja_id').val(items.meja_id)
                $('#tanggal_pemesanan').val(items.tanggal_pemesanan)
                $('#jam_mulai').val(items.jam_mulai)
                $('#jam_selesai').val(items.jam_selesai)
                $('#nama_pemesan').val(items.nama_pemesan)
                $('#jumlah_pelanggan').val(items.jumlah_pelanggan)
                $('.form-edit').attr('action', `/pemesanan/${items.id}`)
            })
        })
    </script> --}}

    <script>
        // alert("Hello World");
        $(function() {
            const orderedList = []
            let total = 0

            const sum = () => {
                return orderedList.reduce((accumulator, object) => {
                    return accumulator + (object.harga * object.qty);
                }, 0)
            };


            const changeQty = (el, inc) => {

                const id = $(el).closest('.li')[0].dataset.id;
                const index = orderedList.findIndex(list => list.menu_id == id)
                // console.log(index)
                orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc

                const txt_subtotal = $(el).closest('.li').find('.subtotal')[0];
                const txt_qty = $(el).closest('.li').find('.qty-item')[0]
                txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc
                txt_subtotal.innerHTML = orderedList[index].harga * orderedList[index].qty;

                $('#total').html(sum())
            }

            //events
            $('.ordered-list').on('click', '.btn-dec', function() {
                changeQty(this, -1)
            })

            $('.ordered-list').on('click', '.btn-inc', function() {
                changeQty(this, 1)
            })

            $('.ordered-list').on('click', '.remove-item', function() {
                const item = $(this).closest('.li')[0];
                let index = orderedList.findIndex(list => list.id == parseInt(item.dataset.id))
                orderedList.splice(index, 1)
                $(item).remove();
                $('#total').html(sum())
            })

            $('#btn-bayar').on('click', function() {
                $.ajax({
                    url: "{{ route('transaksi.store') }}",
                    method: "POST",


                    data: {
                        "_token": "{{ csrf_token() }}",
                        orderedList: orderedList,
                        total: sum()
                    },
                    success: function(data) {
                        console.log(data)
                        Swal.fire({
                            title: data.message,
                            showDenyButton: true,
                            confirmButtonText: "Cetak Nota",
                            denyButtonText: `Ok`
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.open("{{ url('nota') }}/" + data.noTrans)
                                location.reload()
                            } else if (result.isDenied) {
                                location.reload()
                            }
                        })
                    },
                    error: function(error) {
                        console.log(status, error)
                        Swal.fire('Pemesanan Gagal')
                    }
                })
            })
            $(".menu-item").click(function(e) {
                const nama = $(this).data('nama');
                const data = $(this)[0].dataset;
                // const harga = parseFloat($(this).data('harga'));
                const harga = parseFloat(data.harga);
                const id = parseInt(data.id);

                if (orderedList.every(list => list.menu_id !== id)) {
                    let dataN = {
                        'menu_id': id,
                        'menu': nama,
                        'harga': harga,
                        'qty': 1
                    }
                    orderedList.push(dataN);

                    let listOrder = `<div class="card p-2 my-2 li" data-id="${id}" style="border-left: 8px solid #7070f8;">
                                    <div class="d-flex justify-content-between">
                                        <h3>${nama}</h3>
                                        <input class="qty-item" type="number" value="1" style="width:40px;height: 25px;border: none; outline: none;" readonly/>
                                        <div class="d-flex">
                                            <button class="btn btn-danger ms-auto p-0 remove-item" style="width: 25px"><i class="fa fa-trash"></i></button>
                                               <button class="btn btn-primary ms-auto p-0 btn-dec" style="width: 25px"><i class="fa fa-minus"></i></button>
                                            <button class="btn btn-primary ms-auto p-0 btn-inc" style="width: 25px"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <p>Rp. <span class="subtotal">${harga * 1}</span></p>
                                </div>`;
                    $('.ordered-list').append(listOrder)
                }
                $('#total').html(sum())
                // alert(menu_clicked);
            });
        });
    </script>
@endpush
<style>
    .menu-item h4.menu::after {
        content: '';
        position: absolute;
        /* background: #000; */
        cursor: pointer;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>
