<?php

namespace App\Http\Controllers;

use App\Exports\MejaExport;
use App\Models\Meja;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use App\Imports\MejaImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class MejaController extends Controller
{
    /**
      * Display a listing of the resource.
      */
     public function index()
     {
         try {
             $meja = Meja::orderBy('created_at', 'DESC')->get();
             return view('meja.index', compact('meja'));
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
      * @param  \App\Http\Requests\StoreMejaRequest  $request
      * @return \Illuminate\Http\Response
      */
     public function store(StoreMejaRequest $request)
     {
 
         try {
             DB::beginTransaction();
             $validated = $request->validated();
 
             DB::table('meja')->insert($validated);
             DB::commit(); //nyimpan data ke database
 
             //untuk me-refresh ke halaman itu kembali melihat input 
             return redirect('meja')->with('success', "input data berhasil");
         } catch (QueryException | Exception | PDOException $error) {
             DB::rollBack(); //undo perubahan query / table
             return redirect()->back()->withErrors(['message' => $error->getMessage()]);
         };
     }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Models\Meja  $Meja
      * @return \Illuminate\Http\Response
      */
     public function show(Meja $meja)
     {
         //
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Meja  $meja
      * @return \Illuminate\Http\Response
      */
     public function edit(Meja $meja)
     {
         //
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \App\Http\Requests\UpdateMejaRequest  $request
      * @param  \App\Models\Meja  $meja
      * @return \Illuminate\Http\Response
      */
     public function update(UpdateMejaRequest $request, $meja)
     {
         try {
             DB::beginTransaction();
             $meja = meja::findOrFail($meja);
             $validate = $request->validated();
             $meja->update($validate);
             DB::commit();
             return redirect()->back()->with('success', 'data berhasil di ubah');
         } catch (\Exception $e) {
             return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
         }
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Meja  $meja
      * @return \Illuminate\Http\Response
      */
     public function destroy(Meja $meja)
     {
         try {
             $meja->delete();
             return redirect('meja')->with('success', 'Data berhasil di hapus!');
         } catch (QueryException | Exception | PDOException $error) {
             $this->failResponse($error->getMessage(), $error->getCode());
         };
     }
     public function exportData()
     {
         $date = date('Y-m-d');
         return Excel::download(new MejaExport, $date . 'meja.xlsx');
     }
     public function generatepdf()
     {
         $meja = Meja::all();
         $pdf = Pdf::loadView('meja.data', compact('meja'));
         return $pdf->download('meja.pdf');
     }

     public function importData(Request $request)
    {
        // dd($request->import);
        Excel::import(new MejaImport, $request->import);

        return redirect()->back()->with('sucesss', 'Import Data karyawan berhasil');
    }
 }
