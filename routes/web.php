<?php
use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;
Route::post('/chirps',[ChirpController::class,'store']);
Route::get('/',[ChirpController::class,'index']);
Route::delete('/chirps/{chirp}',[ChirpController::class,'destroy'])->name('chirps.destroy');

