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
                    <div class="menu-buttons">
                        @foreach ($jenis as $j)
                            <button class="btn-menu" data-jenis="{{ $j->name }}">{{ $j->name }}</button>
                        @endforeach
                    </div>
                    <div class="menu-container px-1" style="overflow: hidden">
                        @foreach ($jenis as $j)
                            <div class="menu-items" data-jenis="{{ $j->name }}">
                                @foreach ($j->menu as $menu)
                                    <div class="col-md-3 rounded mx-1 my-2 menu-item" data-id="{{ $menu->id }}"
                                        data-nama="{{ $menu->name }}" data-harga="{{ $menu->harga }}"
                                        style="background-color: #e4fdf9">
                                        <div class="d-flex flex-column align-items-center justify-content-between"
                                            style="height: 100%;">
                                            <img src="{{ asset('storage/' . $menu->image) }}"
                                                class="ms-auto mt-2 img-fluid rounded-circle" alt=""
                                                style="width: 80px; height: 80px; border-radius: 50%;">
                                            <h4 class="text-center mt-3 menu">{{ $menu->name }}</h4>
                                            <p class="text-center">Rp. <span>{{ $menu->harga }}</span></p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="item-content col-md-4">
                    <h1>Order</h1>
                    {{-- <label for="nama_pemesan" class="col-sm-4 col-form-label">Nama pelanggan</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="name" name='name'>
                            <option value="">Pilih Pelanggan</option>
                            @foreach($pelanggan as $p)
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                
                    <ul class="ordered-list">

                    </ul>
                    Total Bayar : <h2>Rp. <span id="total"></span></h2>
                    {{-- <textarea class="form-control" id="deskripsi" rows="3" placeholder="Tambahkan catatan"></textarea> --}}
                    <button class="btn btn-primary col-md-3" id="btn-bayar">Bayar</button>
                </div>
            </div>
            <footer class="fixed-bottom">
            </footer>
            </div>
        </main><!-- End #main -->
    </section>
@endsection
@push('script')
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
            $(function() {
            // Hide all menu items initially
            $('.menu-items').hide();

            // Show menu items corresponding to the clicked button
            $('.btn-menu').click(function() {
                var jenis = $(this).data('jenis');
                $('.menu-items').hide(); // Hide all menu items
                $('[data-jenis="' + jenis + '"]').show(); // Show menu items for the clicked button
            });

            // Your existing JavaScript code goes here...
        });

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
                // var namaPelanggan = $('#name').val();
                $.ajax({
                    url: "{{ route('transaksi.store') }}",
                    method: "POST",


                    data: {
                        "_token": "{{ csrf_token() }}",
                        // "pelanggan_id": namaPelanggan,
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
                // const deskripsi = $('#deskripsi').val();

                if (orderedList.every(list => list.menu_id !== id)) {
                    let dataN = {
                        'menu_id': id,
                        'menu': nama,
                        'harga': harga,
                        'qty': 1
                        // 'deskripsi': deskripsi
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
    /* .menu-item h4.menu::after {
        content: '';
        position: absolute;
        background: #000;
        cursor: pointer;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .p{
        text-align: center;
        background-color: skyblue;
        font-size: 20px;
    } */

    /* Style for menu buttons */
.menu-buttons {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.btn-menu {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    margin: 0 10px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-menu:hover {
    background-color: #0056b3;
}

/* Style for menu items */
.menu-items {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.menu-item {
    width: 180px;
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.menu-item:hover {
    transform: translateY(-5px);
}

.menu-item img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 10px;
}

.menu-item h4 {
    font-size: 16px;
    margin-bottom: 5px;
}

.menu-item p {
    font-size: 14px;
    margin: 0;
}

/* Style for ordered list */
.ordered-list {
    list-style: none;
    padding: 0;
}

.ordered-list .li {
    border-bottom: 1px solid #ccc;
    padding: 10px 0;
    margin-bottom: 10px;
}

.ordered-list .li:last-child {
    border-bottom: none;
}

.ordered-list .li h3 {
    font-size: 18px;
    margin-bottom: 5px;
}

.ordered-list .li p {
    font-size: 14px;
    margin: 0;
}

.ordered-list .li input.qty-item {
    width: 40px;
    height: 25px;
    border: none;
    outline: none;
    text-align: center;
}

/* Style for buttons in ordered list */
.ordered-list .li .btn {
    width: 25px;
    height: 25px;
    padding: 0;
    margin-left: 5px;
}

/* Style for total amount */
#total {
    font-size: 20px;
}

/* Style for pay button */
#btn-bayar {
    margin-top: 20px;
}

</style>
