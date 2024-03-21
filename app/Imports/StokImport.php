<?php

namespace App\Imports;

use App\Models\Stok;
// use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StokImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Stok([
            'menu_id' => $row['menu'],
            'jumlah' => $row['jumlah'],
        ]);
    }
}
