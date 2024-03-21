<?php

namespace App\Http\Controllers;

use App\Exports\PemesananExport;
use App\Models\Pemesanan;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Models\Jenis;
use App\Models\Meja;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // try {
        //     $pemesanan = Pemesanan::latest()->get();
        //     $meja = Meja::pluck('nomor_meja', 'id');
        //     return view('Pemesanan.index', compact('pemesanan', 'meja'));
        // } catch (QueryException | Exception | PDOException $error) {
        //     // $this->failResponse($error->getMessage(), $error->getCode());
        //     dd($error->getMessage());
        // }

        $data['jenis'] = Jenis::with(['menu'])->get();
        //dd($data['jenis']);
        return view('pemesanan.index')->with($data);
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
    public function store(StorePemesananRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();

            DB::table('pemesanan')->insert($validated);
            DB::commit(); //nyimpan data ke database

            //untuk me-refresh ke halaman itu kembali melihat input 
            return redirect('pemesanan')->with('succes', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query / table
            dd('error');
            // dd ($this ->failResponse -> getMessage()), $error->getCode());
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemesananRequest $request, $pemesanan)
    {
        try {
            DB::beginTransaction();
            $ePemesanan = Pemesanan::findOrFail($pemesanan);
            $validated = $request->validated();
            $ePemesanan->update($validated);
            DB::commit();
            return redirect()->back()->with('success', ' data berhasil diubah');
        } catch (\Exception $error) {
            return redirect()->back()->withErrors(['message' => $error->getMessage()]);
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        try {
            $pemesanan->delete();
            return redirect('pemesanan')->with('success', 'Data berhasil di hapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        };
    }
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new PemesananExport, $date . 'pemesanan.xlsx');
    }
    public function generatepdf()
    {
        $pemesanan = Pemesanan::all();
        $pdf = Pdf::loadView('pemesanan.data', compact('pemesanan'));
        return $pdf->download('pemesanan.pdf');
    }
}
