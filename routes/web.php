<?php
use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return redirect()->route('register');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // The Dashboard (Index)
    Route::get('/dashboard', [ChirpController::class, 'index'])->name('dashboard');
    
    // Storing a new Chirp
    Route::post('/chirps', [ChirpController::class, 'store'])->name('chirps.store');
    
    // Editing the Chirp (The one you were missing!)
    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit'])->name('chirps.edit');
    
    // Updating the Chirp
    Route::patch('/chirps/{chirp}', [ChirpController::class, 'update'])->name('chirps.update');
    
    // Deleting the Chirp
    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy'])->name('chirps.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
