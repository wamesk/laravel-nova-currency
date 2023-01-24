<?php

namespace Wame\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Carbon\CarbonImmutable;


class CurrencyController extends Controller
{
    public static function currencyCoefficientUpdate($redirect = true)
    {
        $xml = simplexml_load_file('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

        $date = CarbonImmutable::now();

        foreach ($xml->Cube->Cube->Cube as $rate) {
            $code = strval($rate['currency']);
            $coefficient = strval($rate['rate']);

            Currency::where(['code' => $code])->update(['coefficient' => $coefficient, 'updated_at' => $date]);
        }

        if ($redirect) return redirect()->to(config('nova.path') . '/resources/currencies');
    }

}
