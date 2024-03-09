<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [DataController::class, 'index'])->name('data-table');
Route::get('/', [DataController::class, 'index'])->name('users.index');
Route::get('/users', [DataController::class, 'getData'])->name('users');
Route::get('/users/pdf', [DataController::class, 'downloadPdf'])->name('dataTablePdf');
