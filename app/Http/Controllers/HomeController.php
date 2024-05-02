<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Stok;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $menu = Menu::get();
        //Count Menu
        $data['count_menu'] = $menu->count();

        //menupopuler
        $popularMenu = DB::table('detail_transaksi')
        ->select('menu_id', DB::raw('COUNT(*) as total'))
        ->groupBy('menu_id')
        ->orderByDesc('total')
        ->limit(5) // Ambil 5 menu paling populer
        ->get();
        
        // dd($popularMenu);
        // Ambil detail menu berdasarkan id
        $menus = [];
        foreach ($popularMenu as $item) {
        $menu = Menu::find($item->menu_id);
        if ($menu) {
        $menu->total_orders = $item->total;
        $menus[] = $menu;
         }
        }
        $data['menus'] = $menus; 

        
        foreach ($popularMenu as $item) {
            $menu = Menu::find($item->menu_id);
            if ($menu) {
                $menu->total_orders = $item->total;
            }
        }

        //Stok
        foreach ($menus as $menu) {
            $stok = Stok::where('menu_id', $menu->id)->sum('jumlah');
            $menu->sisa_stok = $stok;
        }


        //Pelanggan
        $data['pelanggan'] = Pelanggan::limit(2)->orderby('created_at', 'desc')->get();

        //transaksi pendapatan dan total terjual
        $transaksi = Transaksi::get();
        $data['countra'] = $transaksi->count();
       $data['pendapatan'] = $transaksi->sum('total_harga');
         
       //transaksi terbaru
       $data['transaksi_terbaru'] = Transaksi::with('detailTransaksi')->latest()->take(5)->get();

        // Mengatur data pendapatan untuk grafik
        $pendapatanData = [
        'labels' => [], // Label untuk sumbu x
    '   values' => [], // Nilai pendapatan untuk sumbu y
];

// Ambil data pendapatan dari transaksi
$transaksiPendapatan = Transaksi::select(DB::raw('DATE(MAX(created_at)) as tanggal'), DB::raw('SUM(total_harga) as total'))
    ->groupBy('tanggal')
    ->get();

// Mengisi data pendapatan
foreach ($transaksiPendapatan as $pendapatan) {
    $pendapatanData['labels'][] = $pendapatan->tanggal;
    $pendapatanData['values'][] = $pendapatan->total;
}

// Mengirim data pendapatan ke tampilan
$data['pendapatanData'] = $pendapatanData;

        return view('dashboard/home')->with($data);
    }
}
