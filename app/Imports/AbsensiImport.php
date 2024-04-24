<?php

namespace App\Imports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsensiImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Absensi([
            'namaKaryawan' => $row['nama'],
            'tanggalMasuk' => $row['tanggal'],
            'waktuMasuk' => $row['masuk'],
            'status' => $row['status'],
            // 'waktuKeluar' => $row['keluar'],
        ]);
    }
}
