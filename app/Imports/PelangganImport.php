<?php

namespace App\Imports;

use App\Models\Pelanggan;
// use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelangganImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new Pelanggan([
            'name' => $row['name'],
            'email' => $row['email'],
            'nomor_telepon' => $row['nohp'],
            'alamat' => $row['alamat'],
        ]);
    }
}
