<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\produk_titipan;
use App\Policies\ProdukTitipanPolicy;
use Illuminate\Http\Request;
use App\Models\ProdukTitipan;

class LaporanController extends Controller
{
    public function index()
    {
        // Logika pengambilan data laporan dari model ProdukTitipan
        $dataLaporan = DetailTransaksi::all(); // Sesuaikan dengan query yang sesuai

        return view('laporan.index', ['dataLaporan' => $dataLaporan]);
    }
}
