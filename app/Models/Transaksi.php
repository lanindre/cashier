<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'tanggal',
        'total_harga',
        'metode_pembayaran',
        'deskripsi'
    ];
    public function detailTransaksi() {
        return $this->hasMany(DetailTransaksi::class);
    }
}
