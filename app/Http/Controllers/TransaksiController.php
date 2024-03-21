<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaksiRequest;
use App\Models\Transaksi;
use App\Http\Requests\TransaksiRequest;
// use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\DetailTransaksi;
use Exception;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransaksiRequest $request)
    {

        // try {
        //     DB::beginTransaction();

        //     $last_id = Transaksi::where('tanggal', date('Ymd'))->orderBy('id', 'desc')->select('id')->first();
        //     $next_id_suffix = $last_id ? (int)substr($last_id->id, 10) + 1 : 1;

        //     $noTrans = date('Ymd') . sprintf('%04d', $next_id_suffix);

        //     $insertTransaksi = Transaksi::create([
        //         'id' => $noTrans,
        //         'tanggal' => date('Y-m-d'),
        //         'total_harga' => $request->total,
        //         'metode_pembayaran' => 'cash', // Sesuaikan dengan logika bisnis Anda
        //         'deskripsi' => ''
        //     ]);

        //     DB::commit();
        //     return $insertTransaksi;
        // } catch (QueryException | Exception | PDOException $e) {
        //     DB::rollBack();
        //     return $e->getMessage(); // Mengembalikan pesan kesalahan yang lebih informatif
        // }


        try {

            $last_id = Transaksi::whereDate('tanggal', today())->orderBy('id', 'desc')->first();
            $last_id_number = $last_id ? substr($last_id->id, 8) : 0;
            $noTrans = today()->format('Ymd') . str_pad($last_id_number + 1, 4, '0', STR_PAD_LEFT);

            // Membuat transaksi baru
            $transaksi = Transaksi::create([
                'id' => $noTrans,
                'tanggal' => today(),
                'total_harga' => $request->total,
                'metode_pembayaran' => 'cash', // Metode pembayaran default, bisa disesuaikan
                'deskripsi' => '' // Keterangan default, bisa disesuaikan
            ]);

            // Membuat detail transaksi
            foreach ($request->orderedList as $detail) {
                DetailTransaksi::create([
                    'transaksi_id' => $noTrans,
                    'menu_id' => $detail['menu_id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty']
                ]);
            }

            DB::commit();
            // return $insertTransaksi;
            return response()->json(['status' => true, 'message' => 'Pemesanan Berhasil!', 'noTrans'=> $noTrans]);
        } catch (QueryException | Exception | PDOException $e) {
            dd($e);
            return response()->json(['status' => true, 'message' => 'Pemesanan Gagal!']);
            DB::rollBack();
            // dd($e);
            // return $e;
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }


    public function faktur($nofaktur)
    {
        try {
            // $data = Transaksi::where('id', $nofaktur)->with(['DetailTransaksi'])->first();
            $data['transaksi'] = Transaksi::where('id', $nofaktur)->with(['detailTransaksi' => function ($query) {
                $query->with('menu');
            }])->first();
            // dd($data);
            return view('cetak.faktur')->with($data);
            // dd($data->detailTransaksi);
            // return view()
        } catch (Exception | QueryException | PDOException $e) {
            // dd($e);
            return response()->json(['status' => false, 'message' => 'Pemesanan Gagal ']);
        }
    }
}
