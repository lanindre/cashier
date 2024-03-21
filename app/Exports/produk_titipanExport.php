<?php

namespace App\Exports;

use App\Models\produk_titipan;
use Maatwebsite\Excel\Concerns\FromCollection;

class produk_titipanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return produk_titipan::all();
    }
}
