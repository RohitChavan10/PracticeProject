<?php

use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/records', [RecordController::class, 'index'])->name('records.index');
Route::post('/records', [RecordController::class, 'addRecord'])->name('records.store');
Route::put('/records/{id}', [RecordController::class, 'update'])->name('records.update');
Route::delete('/records/{id}', [RecordController::class, 'destroy'])->name('records.destroy');