<?php
use App\Http\Controllers\TiketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('tiket')->name('tiket.')->group(function(): void {
    Route::get('create', [TiketController::class, 'create'])->name('create');
    Route::post('store', [TiketController::class, 'store'])->name('store');
});

