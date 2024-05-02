<?php

namespace App\Exports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
class PelangganExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pelanggan::all();
    }

    public function map($product): array
    {
        return [
            $product->name,
            $product->email,
            $product->nomor_telepon,
            $product->alamat
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Pelanggan',
            'Email',
            'Nomor Telepon',
            'Alamat',
        ];
    }
}
