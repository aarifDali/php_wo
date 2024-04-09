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

Route::get('delete_records/{id}', [FormSubmit::class, 'delete_records'])->name('delete_records');
Route::get('edit_record/{id}', [FormSubmit::class, 'edit_record'])->name('edit_record');
Route::post('update_data/{id}', [FormSubmit::class, 'update_data']);

// DataTable route
Route::get('viewdt', [FormSubmit::class, 'viewdt'])->name('viewdt');