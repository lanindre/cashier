<?php

namespace App\Exports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class menuExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Menu::all();
        
    }

    public function map($product): array
    {
        return [
            $product->name,
            $product->harga,
            $product->image, // Pastikan metode untuk mengambil URL gambar tersedia pada model Product
            $product->deskripsi,
            $product->jenis_id// Mengambil nama jenis produk, diasumsikan ada relasi dengan model Jenis
        ];
    }
    public function headings(): array
    {
        return [
            'Name',
            'Harga',
            'Image',
            'Deskripsi',
            'Nama Jenis' // Mengganti 'Jenis' menjadi 'Category' sesuai dengan permintaan Anda
        ];
    }
}

