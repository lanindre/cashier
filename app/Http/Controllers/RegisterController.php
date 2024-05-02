<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDOException;

class RegisterController extends Controller
{
    public function index()
    {
        $user = User::latest()->get();
        return view('auth.register', compact('user'));
    }
    public function store(StoreRegisterRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
        User::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('register')->with('success', 'Data berhasil dihapus!');
        } catch (ModelNotFoundException | QueryException | Exception | PDOException $error) {
            dd($error->getMessage(), $error->getCode());
            
        }
    }
}