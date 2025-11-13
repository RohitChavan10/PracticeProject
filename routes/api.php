<?php

use App\Http\Controllers\RecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/add-record', [RecordController::class, 'addRecord']);
Route::get('/records', [RecordController::class, 'index']);
Route::get('/records/{id}', [RecordController::class, 'show']);
Route::put('/records/{id}', [RecordController::class, 'update']);   
Route::delete('/records/{id}', [RecordController::class, 'destroy']);