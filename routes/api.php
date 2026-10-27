<?php

use App\Http\Controllers\Api\peminjamanContrller;
use App\Http\Controllers\BukuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
// BUKU: bisa diakses tanpa login
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/{buku}', [BukuController::class, 'show']);

// ROUTE YANG MEMERLUKAN TOKEN
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/peminjaman', [PeminjamanContrller::class, 'index']);
    Route::post('/peminjaman', [peminjamanContrller::class, 'store']);

    Route::get(
        '/peminjaman/{peminjaman}',
        [PeminjamanContrller::class, 'show']
    );

    Route::patch(
        '/peminjaman/{peminjaman}/kembalikan',
        [PeminjamanContrller::class, 'kembalikan']
    );
});
require __DIR__.'/auth.php';
