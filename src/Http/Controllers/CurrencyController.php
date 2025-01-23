<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Http\Requests\ResourceIndexRequest;
use Wame\LaravelNovaCurrency\Actions\CurrencyCoefficientUpdateAction;

class CurrencyController extends Controller
{
    public static function currencyCoefficientUpdate($redirect = true)
    {
        resolve(CurrencyCoefficientUpdateAction::class)->handle();

        if ($redirect) {
            return redirect()->back();
        }
    }

}
