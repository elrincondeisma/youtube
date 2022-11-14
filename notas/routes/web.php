<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;
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

Route::get('/',[NotaController::class, 'index'])->name('home');
Route::post('/store/nota',[NotaController::class, 'store'])->name('store.nota');
Route::get('/delete/nota/{id}',[NotaController::class, 'destroy'])->name('destroy.nota');
