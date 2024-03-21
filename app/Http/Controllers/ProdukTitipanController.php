<?php

namespace App\Http\Controllers;

use App\Exports\produk_titipanExport;
use App\Models\produk_titipan;
use App\Http\Requests\Storeproduk_titipanRequest;
use App\Http\Requests\Updateproduk_titipanRequest;
use App\Imports\Produk_titipanImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class ProdukTitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         try {
             $produk_titipan = produk_titipan::orderBy('created_at', 'DESC')->get();
             return view('produk_titipan.index', compact('produk_titipan'));
         } catch (QueryException | Exception | PDOException $error) {
             
             return redirect()->back()->withErrors(['message' => $error->getMessage()]);
         }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeproduk_titipanRequest $request)
    {
        
        try {
            DB::beginTransaction();
            produk_titipan::create($request->all());
            // $validated = $request->validated();

            // DB::table('produk_titipan')->insert($validated);
            DB::commit(); //nyimpan data ke database

            //untuk me-refresh ke halaman itu kembali melihat input 
            return redirect('produk_titipan')->with('success', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query / table
            return redirect()->back()->withErrors(['message' => $error->getMessage()]);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(produk_titipan $produk_titipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk_titipan $produk_titipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateproduk_titipanRequest $request, produk_titipan $produk_titipan)
{
    try {
        DB::beginTransaction();
        $validated = $request->validated();
        $produk_titipan->update($validated);
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil diubah');
    } catch (\Exception $error) {
        DB::rollBack();
        return redirect()->back()->withErrors(['message' => $error->getMessage()]);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk_titipan $produk_titipan)
    {
        try {
            $produk_titipan->delete();
            return redirect('produk_titipan')->with('success', 'Data berhasil di hapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        };
    }
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new produk_titipanExport, $date . 'produk_titipan.xlsx');
    }
    public function generatepdf()
    {
        $produk_titipan = produk_titipan::all();
        $pdf = Pdf::loadView('produk_titipan.data', compact('produk_titipan'));
        return $pdf->download('produk_titipan.pdf');
    }
    public function importData(Request $request)
    {
        // dd($request->import);
        Excel::import(new Produk_titipanImport, $request->file);

        return redirect()->back()->with('sucesss', 'Import Data karyawan berhasil');
    }



    
    public function updateStok($id, Request $request)
{
    $produk_titipan = produk_titipan::find($id);
    
    if (!$produk_titipan) {
        return response()->json(['error' => 'Produk tidak ditemukan'], 404);
    }

    // Menggunakan validate untuk memastikan hanya nilai numerik yang diterima
    $request->validate([
        'stok' => 'numeric',
    ]);

    $newStok = $request->input('stok');

    // Update stok produk
    $produk_titipan->stok = $newStok;
    $produk_titipan->save();

    return response()->json(['success' => 'Stok berhasil diperbarui']);
} 

    private function hitungHargaJual($hargaBeli)
    {
    $keuntungan = $hargaBeli * 1.7;
    $hargaJual = ceil($keuntungan / 500) * 500;
    return $hargaJual;
   }
}
