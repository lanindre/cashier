@extends('template.layout')

@push('style')
@endpush

@section('content')
    <section class="content">

        <head>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
            <style>
                
            </style>
        </head>

        <body>
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h1 style="text-align: center;">Informasi Aplikasi Kasir</h1>
        <p>Aplikasi ini adalah sistem kasir yang dikembangkan menggunakan Laravel untuk mempermudah pengelolaan transaksi penjualan.</p>
        
        <h2>Fitur Utama:</h2>
        <ul>
            <li>Manajemen produk</li>
            <li>Transaksi penjualan</li>
            <li>Laporan penjualan</li>
            <li>Integrasi pembayaran</li>
        </ul>
        
        <h2>Teknologi yang Digunakan:</h2>
        <ul>
            <li>Laravel PHP Framework</li>
            <li>MySQL Database</li>
            <li>HTML, CSS, JavaScript</li>
        </ul>
        </body>
        <footer style="text-align: center;">
            <span style="display: inline-block;  font-size: 2.5em; fixed-bottom">
                <h4 style="text-align: center">Contact Us</h4>
                <i class="fab fa-github"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-whatsapp"></i>
            </span>
        </footer>
    </section>
@endsection
@push('script')
@endpush
