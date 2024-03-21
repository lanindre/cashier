<?php

namespace App\Exports;

use App\Models\karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class KaryawanExport implements FromCollection
{
    public function collection()
    {
        return karyawan::all();
    }
}
