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
                    margin: 0;
                    padding: 0;
                    background-color: #f4f4f4;
                    font-size: 25px;
                }

                .content {
                    padding: 20px;
                }

                .header {
                    /* background-color: #0d6efd; */
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
            </style>
        </head>

        <body>
            <div class="content">
                <div class="header">
                    <h2 style="font-size: 40px;">Selamat Datang di Dashboard Aplikasi Kasir</h2>
                </div>
              </br> 
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0 font-weight-bold">Wulan Indah Restiani</h3>
                        <p>Your last login: 21h ago from newzealand.</p>
                    </div>
                </div>
                <div class="stats">
                    <div class="stat-box">
                        <h3>Total Penjualan Bulan Ini</h3>
                        <p>Rp. 10.000.000</p>
                    </div>
                    <div class="stat-box">
                        <h3>Produk Terlaris</h3>
                        <p>Minuman Bersoda</p>
                    </div>
                    <div class="stat-box">
                        <h3>Pendapatan Bersih</h3>
                        <p>Rp. 8.500.000</p>
                    </div>
                </div>
            </div>
        </body>

        </html>

    </section>
@endsection
