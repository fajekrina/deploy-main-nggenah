<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer;
use App\Http\Controllers\DataCustController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TokoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('home_admin');
//});


// Route Data Customer (Halaman Home)
Route::get('/', [Customer::class, 'home']);
Route::post('/', [Customer::class, 'home']);
Route::get('/data_customer', [Customer::class, 'indexCustomer']);

// Route Tambah Customer 1
Route::get('/insertCustomer', [DataCustController::class, 'list']);
Route::post('/insertCustomer', [Customer::class, 'insertCustomer']);

// Route Tambah Customer 2
Route::get('/insertCustomer2', [DataCustController::class, 'list2']);
Route::post('/insertCustomer2', [Customer::class, 'insertCustomer2']);

// Route AJAX
Route::get('/findKota', [DataCustController::class, 'findKota']);
Route::get('/findKecamatan', [DataCustController::class, 'findKecamatan']);
Route::get('/findKelurahan', [DataCustController::class, 'findKelurahan']);
Route::get('/findKodepos', [DataCustController::class, 'findKodepos']);

// Route Barang
Route::get('/data_barang', [BarangController::class, 'indexBarang'])->name('get.data.barang');
Route::get('/barcode/cetak_pdf',[BarangController::class,'cetakPdf']);
Route::post('/barcode/cetak_pdf',[BarangController::class,'cetakPdf']);
Route::get('/barcode/cetak_pdf1',[BarangController::class,'cetakPdf1']); 
Route::post('/barcode/cetak_pdf1',[BarangController::class,'cetakPdf1']);

// Route Scan Barcode
Route::get('/scan',function(){
    return view ('scan');
});
Route::get('/findBarang', [BarangController::class, 'findBarang']);

// Route Lokasi
Route::get('/data_toko', [TokoController::class, 'index']);
Route::get('/insertLokasi', [TokoController::class, 'indexToko']);
Route::post('/insertLokasi', [TokoController::class, 'insertToko']);
Route::get('/kunjungan', function () {
    return view('kunjungan');
});
Route::get('/findToko', [TokoController::class, 'findToko']);

// Route::get('/insertLokasi',function(){
//     return view ('tambah_toko');
// });

//TEST
Route::get('/test',function(){
    return view ('testt');
});


// Route::get('/data_barang',function(){
//     return view ('data_barang');
// });
