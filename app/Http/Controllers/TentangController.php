<?php

namespace App\Http\Controllers;

use App\Models\tentang;
use App\Http\Requests\StoretentangRequest;
use App\Http\Requests\UpdatetentangRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class TentangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // $tentang = tentang::orderBy('created_at', 'DESC')->get();
            return view('tentang.index');
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
    public function store(StoretentangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tentang $tentang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tentang $tentang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetentangRequest $request, tentang $tentang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tentang $tentang)
    {
        //
    }
}
