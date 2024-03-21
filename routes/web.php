<?php

use App\Exports\PelangganExport;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [HomeController::class, 'index']);
Route::resource('pemesanan', PemesananController::class);

Route::resource('karyawan', KaryawanController::class);
Route::get('export/karyawan', [KaryawanController::class, 'exportData'])->name('ikan');
Route::get('generate/karyawan', [KaryawanController::class, 'generatepdf'])->name('hiu');
Route::post('karyawan/import', [KaryawanController::class, 'importData'])->name('bebek');


Route::resource('kategori', KategoriController::class);
Route::get('export/kategori', [KategoriController::class, 'exportData'])->name('guk');
Route::get('generate/kategori', [KategoriController::class, 'generatepdf'])->name('gek');
Route::post('import/kategori', [KategoriController::class, 'importData'])->name('gok');

Route::resource('jenis', JenisController::class);
Route::get('export/jenis', [JenisController::class, 'exportData'])->name('A');
Route::get('generate/jenis', [JenisController::class, 'generatepdf'])->name('B');
Route::post('jenis/import', [JenisController::class, 'importData'])->name('bebek');

Route::resource('menu', MenuController::class);
Route::get('export/menu', [MenuController::class, 'exportData'])->name('D');
Route::get('generate/menu', [MenuController::class, 'generatepdf'])->name('E');
Route::post('menu/import', [MenuController::class, 'importData'])->name('F');

Route::resource('stok', StokController::class);
Route::get('export/stok', [StokController::class, 'exportData'])->name('G');
Route::get('generate/stok', [StokController::class, 'generatepdf'])->name('H');
Route::post('stok/import', [StokController::class, 'importData'])->name('I');

Route::resource('pelanggan', PelangganController::class);
Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('J');
Route::get('generate/pelanggan', [PelangganController::class, 'generatepdf'])->name('K');
Route::post('pelanggan/import', [PelangganController::class, 'importData'])->name('L');

Route::resource('meja', MejaController::class);
Route::get('export/meja', [MejaController::class, 'exportData'])->name('M');
Route::get('generate/meja', [MejaController::class, 'generatepdf'])->name('N');
Route::post('meja/import', [MejaController::class, 'importData'])->name('O');

Route::resource('pemesanan', PemesananController::class);
Route::get('export/pemesanan', [PemesananController::class, 'exportData'])->name('P');
Route::get('generate/pemesanan', [PemesananController::class, 'generatepdf'])->name('Q');
Route::post('pemesanan/import', [PemesananController::class, 'importData'])->name('R');

Route::resource('produk_titipan', ProdukTitipanController::class);
Route::put('/produk_titipan/{id}/update-stok', 'ProdukTitipanController@updateStok')->name('produk_titipan.update-stok');
Route::get('export/produk_titipan', [ProdukTitipanController::class, 'exportData'])->name('Z');
Route::get('generate/produk_titipan', [ProdukTitipanController::class, 'generatepdf'])->name('Y');
Route::post('produk_titipan/import', [ProdukTitipanController::class, 'importData'])->name('X');

Route::resource('transaksi', TransaksiController::class);
Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);

Route::resource('tentang', TentangController::class);
Route::resource('laporan', LaporanController::class);

});
