<?php

use App\Http\Controllers\RepairController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/repair-list/{uuid}',[RepairController::class, 'showAndCreate'])->name('showAndCreate');
Route::post('/repair/store/{uuid}',[RepairController::class, 'storeRepair'])->name('storeRepair');