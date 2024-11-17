<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

Route::get('/', function () {
    return redirect()->route('series.index');
});

Route::resource('/series', SeriesController::class)->except(['show']);

// Route::delete('series/{serie}', [SeriesController::class, 'destroy'])->name('series.destroy');

// Route::controller(SeriesController::class)->group(function(){
//     Route::get('/series', 'index')->name('series.index');
//     Route::get('/series/create', 'create')->name('series.create');
//     Route::post('/series', 'store')->name('series.store');
// });
