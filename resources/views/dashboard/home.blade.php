@extends('template.layout')


@push('style')
@endpush

@section('content')
    <section class="content">
        <html lang="en">

        <head>
            <title>Dashboard Aplikasi Kasir</title>
            <link rel="stylesheet" href="styles.css">
            <style>
                body {
                    font-family: 'Roboto', sans-serif;
                    margin: 10;
                    padding: 0;
                    background-color: #f4f4f4;
                    font-size: 16px;
                }

                .content {
                    padding: 20px;
                }

                .header {
                    background-color: #0d6efd;
                    color: white;
                    padding: 10px;
                    text-align: center;
                    font-weight: bold;
                }

                .stats {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                    gap: 20px;
                    margin-top: 20px;
                }

                .stat-box {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
                    text-align: center;
                }

                h1,
                h2,
                h3 {
                    color: #333;
                }

                p {
                    color: #666;
                }

                p .hi {
                    color: antiquewhite;
                }

                .popular-menu-list {
                    list-style: none;
                    padding: 0;
                }

                .menu-item {
                    display: flex;
                    /* Menggunakan flexbox untuk mengatur posisi gambar dan teks */
                    background-color: #fff;
                    border: 1px solid #ccc;
                    margin-bottom: 10px;
                    padding: 10px;
                }

                .menu-item h3 {
                    margin: 0;
                    font-size: 18px;
                    flex: 1;
                    /* Agar teks menyesuaikan lebar tersisa */
                }

                .menu-item p {
                    margin: 0;
                    font-size: 14px;
                    color: #888;
                }

                .menu-item img {
                    width: 40px;
                    /* Mengatur ukuran gambar */
                    height: auto;
                    margin-right: 7px;
                    /* Jarak antara gambar dan teks */
                }

                .card {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(50px, 1fr));
                    gap: 10px;
                    margin-top: 10px;
                }

                .card-body {
                    padding: 10px;
                    margin: 10px;
                    /* text-align:center; */
                }

                .card-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 16px;
        color: #666;
        margin-bottom: 5px;
    }

                .container {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(50px, 1fr));
                    gap: 10px;
                    margin-top: 10px;
                }

                ..chart-container {
    position: relative;
    margin: auto;
    height: 400px;
    width: 80%;
}

#pendapatanChart {
    width: 100%;
    height: 100%;
}
            </style>
        </head>

        <body>
            <div class="content">
                <div class="header">
                    <h2 style="font-size: 40px;color:none; ">Selamat Datang di Aplikasi Kasir</h2>
                </div>
                </br>
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0 font-weight-bold">Wulan Indah Restiani</h3>
                        <p class="hi">Your last login: 21h ago from newzealand.</p>
                    </div>
                </div>
                <div class="stats">
                    <div class="stat-box">
                        <h3>Total Menu</h3>
                        <div class="count">
                            {{ $count_menu }}
                        </div>
                    </div>
                    <div class="stat-box">
                        <h3>Pendapatan Bersih</h3>
                        <p>Rp {{ number_format($pendapatan, 2) }}</p>
                    </div>
                    <div class="stat-box">
                        <h3>Jumlah terjual hari ini </h3>
                        <div class="countra">
                            {{ $countra }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h2>Transaksi Terbaru</h2>
                                <ul class="list-unstyled">
                                    @foreach($transaksi_terbaru as $transaksi)
                                        <li class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    @foreach($transaksi->detailTransaksi as $detail)
                                                        <h3>{{ $detail->menu->name }}</h3>
                                                    @endforeach
                                                </div>
                                                <div>
                                                    <p>Total Harga: Rp {{ number_format($transaksi->total_harga, 2) }}</p>
                                                    <p>Tanggal: {{ $transaksi->created_at->format('d/m/Y') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h2>Top 5 Penjualan</h2>
                                <ul class="popular-menu-list">
                                    @foreach ($menus as $menu)
                                        <li>
                                            <div class="menu-item">
                                                <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                                                    class="menu-image">
                                                <h3>{{ $menu->name }} <br> Total Pesanan: {{ $menu->total_orders }}</h3>
                                                {{-- <p>Total Pesanan: {{ $menu->total_orders }}</p> --}}
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h2>Stok</h2>
                                <ul class="popular-menu-list">
                                    @foreach($menus as $menu)
                                    <li>
                                        <div class="menu-item">
                                            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                                                class="menu-image">
                                                <div class="menu">{{$menu->name}} - Stok : {{$menu->sisa_stok}}</div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h3>Grafik Pendapatan</h3>
                                <div class="chart-container">
                                    <canvas id="pendapatanChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="container">
                </div>
        </body>

        </html>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('pendapatanChart').getContext('2d');
        var pendapatanData = {!! json_encode($pendapatanData) !!};
        
        var pendapatanChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: pendapatanData.labels,
                datasets: [{
                    label: 'Pendapatan',
                    data: pendapatanData.values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
