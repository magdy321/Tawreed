<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->name('dashboard');



Route::resource('dashboard/products',ProductController::class);

Route::resource('dashboard/clients',ClientsController::class);
Route::resource('dashboard/transactions',TransactionController::class);


