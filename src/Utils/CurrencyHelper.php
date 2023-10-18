<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Utils;

use Wame\LaravelNovaCurrency\Models\Currency;

class CurrencyHelper
{
    public static function format($price, $currency, $decimals = null)
    {
        if (is_numeric($currency)) {
            $currency = \App\Models\Currency::find($currency);
        }
        if (!$currency) {
            $currency = \App\Models\Currency::where(['basic' => \App\Models\Currency::BASIC_ENABLED])->first();
        }

        $return = '';

        if (\App\Models\Currency::SYMBOL_PLACE_BEFORE_PRICE === $currency->symbol_place) {
            $return .= $currency->symbol . ' ';
        }

        if (null === $decimals) {
            $decimals = $currency->decimals;
        }

        $decPoint = $currency->dec_point == Currency::DECIMAL_SEPARATOR_COMMA ? ',' : '.';
        $thousandsSep = $currency->thousands_sep == Currency::THOUSANDS_SEPARATOR_DOT ? '.' : ' ';

        $return .= number_format((float) str_replace(',', '.', (string) $price), (int) $decimals, $decPoint, $thousandsSep);

        if (\App\Models\Currency::SYMBOL_PLACE_AFTER_PRICE === $currency->symbol_place) {
            $return .= ' ' . $currency->symbol;
        }

        return $return;
    }


    public static function fillUsing($request, $model, $attribute, $requestAttribute): void
    {
        $model->{$attribute} = str_replace(',', '.', $request->input($attribute));
    }
}
