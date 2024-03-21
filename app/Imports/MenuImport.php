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
            if (isset($row['name_menu'])) {
                Menu::create([
                    'name' => $row['name_menu'],
                    'harga' => $row['harga'],
                    'deskripsi' => $row['deskripsi'],
                    'jenis_id' => $row['jenis']
                ]);
            }
        }
    }
    
}

