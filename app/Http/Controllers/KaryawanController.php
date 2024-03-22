<?php

namespace App\Http\Controllers;

use App\Exports\KaryawanExport;
use App\Models\karyawan;
use App\Http\Requests\StorekaryawanRequest;
use App\Http\Requests\UpdatekaryawanRequest;
use App\Imports\KaryawanImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $karyawan = karyawan::orderBy('created_at', 'DESC')->get();
            return view('karyawan.index', compact('karyawan'));
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
    public function store(StorekaryawanRequest $request)
    {

        try {
            DB::beginTransaction();
            // dd($request-> file('foto'));
            $validated = $request->validated();
            $foto = $request->file('foto');
            // Storage::put('foto'.$request->file('foto'));
            DB::table('karyawan')->insert($validated);
            $foto->storeAs('karyawan', $foto->getClientOriginalName());
            DB::commit(); //nyimpan data ke database

            //untuk me-refresh ke halaman itu kembali melihat input 
            return redirect('karyawan')->with('success', "input data berhasil");
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
    public function show(karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(karyawan $karyawan)
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
    public function update(UpdatekaryawanRequest $request, $karyawan)
    {
        try {
            DB::beginTransaction();
            $karyawan = karyawan::findOrFail($karyawan);
            $validate = $request->validated([
                'nip' => 'required'
            ]);
            $karyawan->update($validate);
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
    public function destroy(karyawan $karyawan)
    {
        try {
            $karyawan->delete();
            return redirect('karyawan')->with('success', 'Data berhasil di hapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        };
    }

    public function exportData()
{
    try {
        $date = date('Y-m-d');
        return Excel::download(new KaryawanExport, $date . 'karyawan.xlsx');
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
}


    public function generatepdf()
    {
        $karyawan = karyawan::all();
        $pdf = Pdf::loadView('karyawan.data', compact('karyawan'));
        return $pdf->download('karyawan.pdf');
    }


    public function importData(Request $request)
    {
        // dd($request->import);
        Excel::import(new KaryawanImport, $request->file);

        return redirect()->back()->with('sucesss', 'Import Data karyawan berhasil');
    }
}
