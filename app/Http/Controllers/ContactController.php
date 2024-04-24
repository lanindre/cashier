<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }
    public function store(Request $request)
    {
        // Proses penyimpanan pertanyaan
        // ...

        return redirect()->route('contact.index')->with('success', 'Pertanyaan Anda telah terkirim!');
    }
}
