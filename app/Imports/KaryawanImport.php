<?php

namespace App\Imports;

use App\Models\Karyawan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KaryawanImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            Karyawan::create([
                'nip' => $row[0],
                'nik' => $row[1],
                'nama' => $row[2],
                'jenis_kelamin' => $row[3],
                'tempat_lahir' => $row[4],
                'tanggal_lahir' => $row[5],
                'telepon' => $row[6],
                'agama' => $row[7],
                'status_nikah' => $row[8],
                'alamat' => $row[9],
                'foto' => $row[10]
            ]);
        }
    }
}
