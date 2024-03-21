<?php

namespace App\Imports;

use App\Models\Meja;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MejaImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Meja([
            'nomor_meja' => $row['meja'],
            'kapasitas' => $row['kapasitas'],
            'status' => $row['status'],
        ]);
    }
}
