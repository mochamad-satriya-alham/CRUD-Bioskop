<?php
use App\Http\Controllers\TiketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('tiket')->name('tiket.')->group(function(): void {
    Route::get('create', [TiketController::class, 'create'])->name('create');
    Route::post('store', [TiketController::class, 'store'])->name('store');
    Route::get('/', [TiketController::class, 'index'])->name('index');
    Route::get('/{id}', [TiketController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [TiketController::class, 'update'])->name('update');
    Route::delete('/{id}', [TiketController::class, 'destroy'])->name('delete');
});

