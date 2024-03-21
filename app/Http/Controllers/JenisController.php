<?php

namespace App\Http\Controllers;

use App\Exports\JenisExport;
use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use App\Imports\JenisImport;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $jenis = Jenis::latest()->get();
            $kategori = Kategori::pluck('name', 'id');
            return view('jenis.index', compact('jenis', 'kategori'));
        } catch (QueryException | Exception | PDOException $error) {
            // $this->failResponse($error->getMessage(), $error->getCode());
            dd($error->getMessage());
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
     * @param  \App\Http\Requests\StorebarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisRequest $request)
    {

        try {
            DB::beginTransaction();
            $validated = $request->validated();

            DB::table('jenis')->insert($validated);
            DB::commit(); //nyimpan data ke database

            //untuk me-refresh ke halaman itu kembali melihat input 
            return redirect('jenis')->with('succes', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query / table
            dd('error');
            // dd ($this ->failResponse -> getMessage()), $error->getCode());
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenis  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenis  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisRequest  $request
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisRequest $request, $jenis)
    {
        try {
            DB::beginTransaction();
            $eJenis = Jenis::findOrFail($jenis);
            $validated = $request->validated();
            $eJenis->update($validated);
            DB::commit();
            return redirect()->back()->with('success', ' data berhasil diubah');
        } catch (\Exception $error) {
            return redirect()->back()->withErrors(['message' => $error->getMessage()]);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis $jeni)
    {
        try {
            $jeni->delete();
            return redirect('jenis')->with('success', 'Data berhasil di hapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        };
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new JenisExport, $date . 'jenis.xlsx');
    }
    public function generatepdf()
    {
        $jenis = Jenis::all();
        $pdf = Pdf::loadView('jenis.data', compact('jenis'));
        return $pdf->download('jenis.pdf');
    }

    public function importData(Request $request)
    {
        Excel::import(new JenisImport, $request->import);

        return redirect()->back()->with('sucesss', 'Import Data karyawan berhasil');
    }
}
