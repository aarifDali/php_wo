<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormSubmit;

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

Route::get('/', [FormSubmit::class, 'form'])->name('form');
Route::post('store_data', [FormSubmit::class, 'store_data']);
Route::get('records', [FormSubmit::class, 'records'])->name('records');

