<?php

use Illuminate\Support\Facades\Route;

Route::get('/currency/import', [\Wame\LaravelNovaCurrency\Controllers\CurrencyController::class, 'currencyCoefficientUpdate'])->name('currency.import');
