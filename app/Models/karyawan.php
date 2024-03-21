<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
     protected $table = 'karyawan';
     protected $fillable = [
        'nip',
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'telepon',
        'agama',
        'status_nikah',
        'alamat',
        'foto'
     ];
}
