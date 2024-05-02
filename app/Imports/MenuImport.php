<?php

namespace App\Imports;

use App\Models\Menu;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row){
            if (isset($row['Name'])) {
                Menu::create([
                    'name' => $row['Name'],
                    'harga' => $row['Harga'],
                    'image' => $row['Image'],
                    'deskripsi' => $row['Deskripsi'],
                    'jenis_id' => $row['Nama_Jenis']
                ]);
            }
        }
    }
    
}

