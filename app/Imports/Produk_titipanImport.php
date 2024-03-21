<?php

namespace App\Imports;

use App\Models\produk_titipan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Produk_titipanImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new produk_titipan([
            'nama_produk' => $row['nama_produk'],
            'nama_supplier' => $row['nama_supplier'],
            'harga_beli' => $row['harga_beli'],
            'harga_jual' => $row['harga_jual'],
            'stok' => $row['stok'],
            'keterangan' => $row['keterangan'],
        ]);
    }
}
