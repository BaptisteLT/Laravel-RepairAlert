<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\RepairDoneController;

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
Route::delete('/repair/delete/{uuid}',[RepairController::class, 'deleteRepair'])->name('deleteRepair');
Route::get('/repair/switch-notification/{uuid}',[RepairController::class, 'switchNotification'])->name('switchNotification');



Route::get('/repair-done-list/{uuid}',[RepairDoneController::class, 'showAndCreate'])->name('showAndCreate');
Route::post('/repair-done/store/{uuid}',[RepairDoneController::class, 'storeRepairDone'])->name('storeRepairDone');