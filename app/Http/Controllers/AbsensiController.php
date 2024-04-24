<?php

namespace App\Http\Controllers;

use App\Exports\AbsensiExport;
use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use App\Imports\AbsensiImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $absensi = Absensi::orderBy('created_at', 'DESC')->get();
            return view('absensi.index', compact('absensi'));
        } catch (QueryException | Exception | PDOException $error) {
            
            return redirect()->back()->withErrors(['message' => $error->getMessage()]);
        }
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
    public function store(StoreAbsensiRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();

            DB::table('absensi')->insert($validated);
            DB::commit(); //nyimpan data ke database

            //untuk me-refresh ke halaman itu kembali melihat input 
            return redirect('absensi')->with('success', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query / table
            return redirect()->back()->withErrors(['message' => $error->getMessage()]);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        try {
            DB::beginTransaction();
            $absensi = Absensi::findOrFail($absensi);
            $validate = $request->validated();
            $absensi->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        try {
            $absensi->delete();
            return redirect('absensi')->with('success', 'Data berhasil di hapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        };
    }
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new AbsensiExport, $date . 'absensi.xlsx');
    }
    public function generatepdf()
    {
        $absensi = Absensi::all();
        $pdf = Pdf::loadView('absensi.data', compact('absensi'));
        return $pdf->download('absensi.pdf');
    }

    public function importData(Request $request)
    {
        Excel::import(new AbsensiImport, $request->import);

        return redirect()->back()->with('sucesss', 'Import Data karyawan berhasil');
    }


    public function updateStatus(Request $request)
    {
        $row_num = $request->input('row_num');
        $new_status = $request->input('new_status');

        // Temukan data absensi dengan nomor baris yang sesuai
        $absen = Absensi::find($row_num);

        // Jika data absensi tidak ditemukan, kembalikan respons dengan pesan error
        if (!$absen) {
            return response()->json(['error' => 'Data absensi tidak ditemukan', 'id' => $row_num], 404);
        }

        // Perbarui status absensi
        $absen->status = $new_status;
        $absen->save();

        return response()->json(['message' => 'Status updated successfully']);
    }
}
