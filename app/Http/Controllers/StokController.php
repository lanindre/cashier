<?php

namespace App\Http\Controllers;

use App\Exports\StokExport;
use App\Models\Stok;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use App\Imports\StokImport;
use App\Models\Menu;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class StokController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $stok = Stok::latest()->get();
            $menu = Menu::pluck('name','id');
            return view('stok.index', compact('stok', 'menu'));
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
    public function store(StoreStokRequest $request)
    {

        try {
            DB::beginTransaction();
            $validated = $request->validated();

            DB::table('stok')->insert($validated);
            DB::commit(); //nyimpan data ke database

            //untuk me-refresh ke halaman itu kembali melihat input 
            return redirect('stok')->with('succes', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query / table
            dd($error->getMessage());
            // dd ($this ->failResponse -> getMessage()), $error->getCode());
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStokRequest  $request
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStokRequest $request, $stok)
    {
        try {
            DB::beginTransaction();
            $eStok = Stok::findOrFail($stok);
            $validated = $request->validated();
            $eStok->update($validated);
            DB::commit();
            return redirect()->back()->with('success', ' data berhasil diubah');
        } catch (\Exception $error) {
            return redirect()->back()->withErrors(['message' => $error->getMessage()]);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stok $stok)
    {
        try {
            $stok->delete();
            return redirect('stok')->with('success', 'Data berhasil di hapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        };
    }
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new StokExport, $date . 'stok.xlsx');
    }
    public function generatepdf()
    {
        $stok = Stok::all();
        $pdf = Pdf::loadView('stok.data', compact('stok'));
        return $pdf->download('stok.pdf');
    }

    public function importData(Request $request)
    {
        Excel::import( new StokImport, $request->import);
        return redirect()->back()->with('sucess', 'Import berhasil di tambahkan');
    }
}
