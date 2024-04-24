<?php

namespace App\Http\Controllers;

use App\Exports\MenuExport;
use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Imports\MenuImport;
use App\Models\Jenis;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $menu = Menu::latest()->get();
            $jenis = Jenis::pluck('name', 'id');
            return view('menu.index', compact('menu', 'jenis'));
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
    public function store(StoreMenuRequest $request)
    {

        try {
            DB::beginTransaction();
            $menu = Menu::create($request->all());
            $file = $request->file('image');

            // Menyimpan file gambar ke direktori penyimpanan 'menu' dengan nama yang unik
            $file_name = $file->getClientOriginalName(); // Nama file asli
            $file_path = $file->storeAs('menu', $file_name); // Simpan file dengan nama unik di direktori 'menu'

            // Simpan nama file ke dalam kolom image di database
            $menu->image = $file_path;
            $menu->save();
            DB::commit(); //nyimpan data ke database

            //untuk me-refresh ke halaman itu kembali melihat input 
            return redirect('menu')->with('succes', "input data berhasil");
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
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, $menu)
    {
        try {
            DB::beginTransaction();
            $eMenu = Menu::findOrFail($menu);
            $validated = $request->validated();
            $eMenu->update($validated);
            DB::commit();
            return redirect()->back()->with('success', ' data berhasil diubah');
        } catch (\Exception $error) {
            return redirect()->back()->withErrors(['message' => $error->getMessage()]);
        };

    //     $menu->update($request->all());

    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');

    //         if ($file->isValid()) {
    //             $file_name = $file->getClientOriginalName(); //nama file asli
    //             $file_path = $file->storeAs('ya', $file_name); //nama file asli

    //             $menu->image = $file_path;
    //             $menu->save();
    //             return redirect('menu')->with('success', 'Update data berhasil!');
    //         } else {
    //             return redirect('menu')->with('error', 'Gagal mengupdate data gambar!');
    //         }
    //     } else {
    //         return redirect('menu')->with('error', 'Tidak ada gambar yang diunggah');
    //     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();
            return redirect('menu')->with('success', 'Data berhasil di hapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        };
    }
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new MenuExport, $date . 'menu.xlsx');
    }
    public function generatePdf()
    {
        $menu = Menu::all();
        $pdf = Pdf::loadView('menu.export', compact('data'));
        return $pdf->download('menu.pdf');
    }

    public function importData(Request $request)
    {
        Excel::import(new MenuImport, $request->import);

        return redirect()->back()->with('sucesss', 'Import Data karyawan berhasil');
    }
}
