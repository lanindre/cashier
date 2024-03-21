<?php

namespace App\Http\Controllers;

use App\Exports\KategoriExport;
use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Models\karyawan;
use App\Policies\KategoriPolicy;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class KategoriController extends Controller
{
    public function index()
    {
        try {
            $kategori = Kategori::orderBy('created_at', 'DESC')->get();
            return view('kategori.index', compact('kategori'));
        } catch (QueryException | Exception | PDOException $error) {
            
            return redirect()->back()->withErrors(['message' => $error->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriRequest $request)
    {

        try {
            DB::beginTransaction();
            $validated = $request->validated();

            DB::table('kategori')->insert($validated);
            DB::commit(); //nyimpan data ke database

            //untuk me-refresh ke halaman itu kembali melihat input 
            return redirect('kategori')->with('success', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query / table
            return redirect()->back()->withErrors(['message' => $error->getMessage()]);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepelangganRequest  $request
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriRequest $request, $kategori)
    {
        try {
            DB::beginTransaction();
            $kategori = kategori::findOrFail($kategori);
            $validate = $request->validated();
            $kategori->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategori $kategori)
    {
        try {
            $kategori->delete();
            return redirect('kategori')->with('success', 'Data berhasil di hapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        };
    }
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new KategoriExport, $date . 'kategori.xlsx');
    }
    public function generatepdf()
    {
        $kategori = Kategori::all();
        $pdf = Pdf::loadView('kategori.data', compact('kategori'));
        return $pdf->download('kategori.pdf');
    }
}
