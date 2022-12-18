<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KosController;
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
    return view('welcome');
});

Route::controller(KosController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    //Route::get('/kos/{id}', 'show');
    //create
    Route::post('/kos', 'store')->name('kos_store');
    //fuzzy
    Route::get('/kos/fuzzy', 'fuzzy')->name('fuzzy');
    Route::get('/proses/fuzzy', 'proses')->name('proses');
    //update
    Route::get('/kos/edit/{id}', 'editKos')->name('edit');
    Route::post('/kos/update/{id}', 'updateKos')->name('update');
    //delete
    Route::delete('/delete/{id}', 'deleteKos')->name('delete');
});
