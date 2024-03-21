<?php

namespace App\Http\Controllers;

use App\Exports\PelangganExport;
use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Imports\PelangganImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class PelangganController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pelanggan = Pelanggan::orderBy('created_at', 'DESC')->get();
            return view('pelanggan.index', compact('pelanggan'));
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
    public function store(StorePelangganRequest $request)
    {

        try {
            DB::beginTransaction();
            $validated = $request->validated();

            DB::table('pelanggan')->insert($validated);
            DB::commit(); //nyimpan data ke database

            //untuk me-refresh ke halaman itu kembali melihat input 
            return redirect('pelanggan')->with('success', "input data berhasil");
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
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelangganRequest  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelangganRequest $request, $pelanggan)
    {
        try {
            DB::beginTransaction();
            $pelanggan = pelanggan::findOrFail($pelanggan);
            $validate = $request->validated();
            $pelanggan->update($validate);
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
    public function destroy(Pelanggan $pelanggan)
    {
        try {
            $pelanggan->delete();
            return redirect('pelanggan')->with('success', 'Data berhasil di hapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        };
    }
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new PelangganExport, $date . 'pelanggan.xlsx');
    }
    public function generatepdf()
    {
        $pelanggan = Pelanggan::all();
        $pdf = Pdf::loadView('pelanggan.data', compact('pelanggan'));
        return $pdf->download('pelanggan.pdf');
    }

    public function importData(Request $request)
    {
        Excel::import(new PelangganImport, $request->import);
        return redirect()->back()->with('sucess', 'Import berhasul di tambahkan');
    }
}
