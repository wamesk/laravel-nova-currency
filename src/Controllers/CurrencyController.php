<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Carbon\CarbonImmutable;

class CurrencyController extends Controller
{
    /**
     * @return Currency
     */
    private static function model(): Currency
    {
        return new Currency;
    }

    public static function currencyCoefficientUpdate($redirect = true)
    {
        $xml = simplexml_load_file('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

        $date = CarbonImmutable::now();

        foreach ($xml->Cube->Cube->Cube as $rate) {
            $code = (string) ($rate['currency']);
            $coefficient = (string) ($rate['rate']);

            Currency::where(['code' => $code])->update(['coefficient' => $coefficient, 'updated_at' => $date]);
        }

        if ($redirect) {
            return redirect()->to(config('nova.path') . 'resources/currencies');
        }
    }

    /**
     * @return array
     */
    public static function getListForSelect(): array
    {
        $list = self::model()->where(['status' => Currency::STATUS_ENABLED])->orderBy('code');

        $return = [];

        foreach ($list->get() as $item) {
            $return[$item->code] = $item->code . ' - ' . $item->title . ' [' . $item->symbol . ']';
        }

        return $return;
    }
}
