<?php

namespace App\Imports;

use App\Models\Jenis;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JenisImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (!empty($row['name'])) {
            return new Jenis([
                'name' => $row['name'],
            ]);
        }
    }
}
