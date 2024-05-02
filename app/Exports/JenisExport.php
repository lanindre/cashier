<?php

namespace App\Exports;

use App\Models\Jenis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class JenisExport implements FromCollection ,  WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jenis::all();
    }

    public function map($product): array
    {
        return [
            $product->name
        ];
    }
    public function headings(): array
    {
        return [
            'Nama Jenis'
        ];
    }
}

