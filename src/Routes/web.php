<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Route;

Route::get('/currency/import', [\Wame\LaravelNovaCurrency\Http\Controllers\CurrencyController::class, 'currencyCoefficientUpdate'])->name('currency.import');
