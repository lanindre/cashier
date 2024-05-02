<?php

namespace App\Exports;

use App\Models\Stok;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StokExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Stok::all();
    }
    public function map($product): array
    {
        return [
            $product->menu_id,
            $product->jumlah
        ];
    }
    public function headings(): array
    {
        return [
            'Menu',
            'Jumlah'
        ];
    }
}
