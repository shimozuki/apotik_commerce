<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
});

Auth::routes();

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/member')->group(function () {

    //pesan 
    Route::get('/pesan/{id}', [PesanController::class, 'index'])->name('pesan');

    // pesan obat
    Route::post('/pesan/{id}', [PesanController::class, 'pesan']);
    //pesanan diterima
    Route::post('/pesan/pesanan-diterima/{id}', [PesanController::class, 'pesan_diterima']);

    // Check out
    Route::get('/check-out', [PesanController::class, 'check_out']);
    Route::delete('check-out/{id}', [PesanController::class, 'delete']);

    // Konfirmasi check out
    Route::get('/konfirmasi-check-out', [PesanController::class, 'konfirmasi']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'index']);
    // update profile
    Route::post('/profile', [ProfileController::class, 'update']);

    // history
    Route::get('/history', [HistoryController::class, 'index']);
    // detail history
    Route::get('/history/{id}', [HistoryController::class, 'detail']);
});

Route::prefix('/admin')->group(function () {

    //profile
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'update']);

    // Dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('isAdmin');

    //Pengguna (Admin)
    Route::get('/list-admin', [PenggunaController::class, 'admin'])->name('admin');;
    Route::get('/tambah-admin', [PenggunaController::class, 'tambah_admin'])->name('admin');
    Route::post('/tambah-admin', [PenggunaController::class, 'add_admin'])->name('admin');
    Route::get('/list-admin/{id}', [PenggunaController::class, 'edit_admin'])->name('admin');
    Route::post('/list-admin/{id}', [PenggunaController::class, 'update_admin']);
    Route::delete('/list-admin/{id}', [PenggunaController::class, 'delete_admin']);

    //Pengguna (Member)
    Route::get('/list-member', [PenggunaController::class, 'member'])->name('member');
    Route::delete('/list-member/{id}', [PenggunaController::class, 'delete_member']);

    //Obat
    Route::get('/tambah-obat', [ObatController::class, 'create'])->name('obat');
    Route::post('/tambah-obat', [ObatController::class, 'store']);
    Route::get('/obat', [ObatController::class, 'index'])->name('obat');
    Route::get('/obat/{id}', [ObatController::class, 'edit'])->name('obat');
    Route::post('/obat/{id}', [ObatController::class, 'update']);
    Route::delete('/obat/{id}', [ObatController::class, 'destroy']);
    Route::get('/obat/show/{id}', [ObatController::class, 'show']);

    //jasa
    Route::get('/tambah-jasa', [JasaController::class, 'create'])->name('jasa');
    Route::post('/tambah-jasa', [JasaController::class, 'store']);
    Route::get('/jasa', [JasaController::class, 'index'])->name('jasa');
    Route::get('/jasa/{id}', [JasaController::class, 'edit'])->name('jasa');
    Route::post('/jasa/{id}', [JasaController::class, 'update']);
    Route::delete('/jasa/{id}', [JasaController::class, 'destroy']);

    //distributor
    Route::get('/tambah-distributor', [DistributorController::class, 'create'])->name('distributor');
    Route::post('/tambah-distributor', [DistributorController::class, 'store']);
    Route::get('/distributor', [DistributorController::class, 'index'])->name('distributor');
    Route::get('/distributor/{id}', [DistributorController::class, 'edit'])->name('distributor');
    Route::post('/distributor/{id}', [DistributorController::class, 'update']);
    Route::delete('/distributor/{id}', [DistributorController::class, 'destroy']);

    //pembelian
    Route::get('/pembelians', [PembelianController::class, 'index'])->name('pembelians.index');
    Route::get('/tambah-pembelian1', [PembelianController::class, 'create1'])->name('pembelians.create1');
    Route::post('/pembelians1', [PembelianController::class, 'store1'])->name('pembelians.store1');

    Route::get('/tambah-pembelian2', [PembelianController::class, 'create2'])->name('pembelians.create2');
    Route::post('/pembelians2', [PembelianController::class, 'store2'])->name('pembelians.store2');

    Route::get('/pembelians/listPembelian', [PembelianController::class, 'listPembelian'])->name('pembelians.listPembelian');
    Route::post('/pembelians/confirm', [PembelianController::class, 'confirm'])->name('pembelians.confirm');

    Route::get('/pembelians/show/{pembelian}', [PembelianController::class, 'detail'])->name('pembelians.detail');

    Route::delete('/pembelians/{pembelian_detail}', [PembelianController::class, 'destroy'])->name('pembelians.destroy');;

    //penjualan
    Route::get('/penjualans', [PenjualanController::class, 'index'])->name('penjualans.index');
    Route::get('/penjualans1', [PenjualanController::class, 'store1'])->name('penjualans.store1');
    Route::get('/tambah-penjualan', [PenjualanController::class, 'create'])->name('penjualans.create');
    Route::post('/penjualans2', [PenjualanController::class, 'store2'])->name('penjualans.store2');

    Route::get('/penjualans/listpenjualan', [PenjualanController::class, 'listpenjualan'])->name('penjualans.listpenjualan');
    Route::post('/penjualans/confirm', [PenjualanController::class, 'confirm'])->name('penjualans.confirm');

    Route::get('/penjualans/show/{penjualan}', [PenjualanController::class, 'detail'])->name('penjualans.detail');

    Route::delete('/penjualans/{penjualan}', [PenjualanController::class, 'destroy'])->name('penjualans.destroy');;

    //laporan
    Route::get('/laporans', [LaporanController::class, 'index'])->name('laporans.index');
    Route::post('/laporans', [LaporanController::class, ' refresh'])->name('laporans.refresh');
    Route::get('/laporans/data{awal}/{akhir}', [LaporanController::class, ' refresh'])->name('laporans.data');

    //Pesanan
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan');
    Route::get('/pesanan/{id}', [PesananController::class, 'detail'])->name('pesanan');
    Route::post('/pesanan/{id}', [PesananController::class, 'konfirmasi']);

    //Pesanan Dibayar
    Route::get('/pesanan-dibayar', [PesananController::class, 'dibayar'])->name('dibayar');
    Route::get('/pesanan-dibayar/{id}', [PesananController::class, 'proses_pesanan'])->name('dibayar');
    Route::post('/pesanan-dibayar/{id}', [PesananController::class, 'kirim_pesanan']);

    //Pesanan Dikirim
    Route::get('/pesanan-dikirim', [PesananController::class, 'dikirim'])->name('dikirim');
    Route::get('/pesanan-dikirim/{id}', [PesananController::class, 'detail_dikirim'])->name('dikirim');

    //Pesanan Diterima
    Route::get('/pesanan-selesai', [PesananController::class, 'selesai'])->name('selesai');
    Route::get('/pesanan-selesai/{id}', [PesananController::class, 'detail_pesanan'])->name('selesai');
});
