<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PetugasScanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Models\Pengunjung;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('pengunjung/index');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/dashboardadmin', function () {
    $jumlahPengunjung = Pengunjung::count();
    return view('admin/dashboardadmin', compact('jumlahPengunjung'));
});

Route::get('/home', function () {
    return view('home');
});

Route::prefix('paketwisata')->group(function () {
    Route::get('/', [PaketWisataController::class, 'index'])->name('admin.paketwisata.index');
    Route::get('/create', [PaketWisataController::class, 'create'])->name('admin.paketwisata.create');
    Route::post('/store', [PaketWisataController::class, 'store'])->name('admin.paketwisata.store');
    Route::get('/{paketwisata}/edit', [PaketWisataController::class, 'edit'])->name('admin.paketwisata.edit');
    Route::put('/{paketwisata}/edit', [PaketWisataController::class, 'update'])->name('admin.paketwisata.update');
    Route::delete('/{paketwisata}', [PaketWisataController::class, 'destroy'])->name('admin.paketwisata.destroy');
});

Route::prefix('pengunjung')->group(function () {
    Route::get('/', [PengunjungController::class, 'index'])->name('admin.pengunjung.index');
    Route::get('/create', [PengunjungController::class, 'create'])->name('admin.pengunjung.create');
    Route::post('/store', [PengunjungController::class, 'store'])->name('admin.pengunjung.store');
    Route::get('/{pengunjung}/edit', [PengunjungController::class, 'edit'])->name('admin.pengunjung.edit');
    Route::put('/{pengunjung}/edit', [PengunjungController::class, 'update'])->name('admin.pengunjung.update');
    Route::delete('/{pengunjung}', [PengunjungController::class, 'destroy'])->name('admin.pengunjung.destroy');
});

Route::prefix('petugasscan')->group(function () {
    Route::get('/', [PetugasScanController::class, 'index'])->name('admin.petugasscan.index');
    Route::get('/create', [PetugasScanController::class, 'create'])->name('admin.petugasscan.create');
    Route::post('/store', [PetugasScanController::class, 'store'])->name('admin.petugasscan.store');
    Route::get('/{petugasscan}/edit', [PetugasScanController::class, 'edit'])->name('admin.petugasscan.edit');
    Route::put('/{petugasscan}/edit', [PetugasScanController::class, 'update'])->name('admin.petugasscan.update');
    Route::delete('/{petugasscan}', [PetugasScanController::class, 'destroy'])->name('admin.petugasscan.destroy');
});

Route::prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('admin.order.index');
    Route::get('/create', [OrderController::class, 'create'])->name('admin.order.create');
    Route::post('/store', [OrderController::class, 'store'])->name('admin.order.store');
    Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('admin.order.edit');
    Route::put('/{order}/edit', [OrderController::class, 'update'])->name('admin.order.update');
    Route::delete('/{order}', [OrderController::class, 'destroy'])->name('admin.order.destroy');
});

Route::prefix('ordemitem')->group(function () {
    Route::get('/create/{order_id}', [OrderItemController::class, 'create'])->name('admin.orderitem.create');
    Route::post('/store', [OrderItemController::class, 'store'])->name('admin.orderitem.store');
});

Route::prefix('transaction')->group(function () {
    Route::get('/', [TransactionController::class, 'index'])->name('admin.transaction.index');
    Route::get('/create', [TransactionController::class, 'create'])->name('admin.transaction.create');
    Route::post('/store', [TransactionController::class, 'store'])->name('admin.transaction.store');
    Route::get('/{transaction}/edit', [TransactionController::class, 'edit'])->name('admin.transaction.edit');
    Route::put('/{transaction}/edit', [TransactionController::class, 'update'])->name('admin.transaction.update');
    Route::delete('/{transaction}', [TransactionController::class, 'destroy'])->name('admin.transaction.destroy');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
