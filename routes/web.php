<?php

use App\Http\Controllers\WebbookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('book.index');
});

// Route::get('/', [WebbookController::class, 'index']);
// Route::post('/', [WebbookController::class, 'store']);
// Route::delete('/{id}', [WebbookController::class, 'destroy']);

Route::resource('book', WebbookController::class);
