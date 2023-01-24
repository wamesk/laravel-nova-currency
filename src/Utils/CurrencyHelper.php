<?php

namespace Wame\LaravelNovaCurrency\Utils;


class CurrencyHelper
{
    public static function format($price, $currency, $decimals = null)
    {
        if (is_numeric($currency)) $currency = \App\Models\Currency::find($currency);
        if(!$currency) $currency = \App\Models\Currency::where(['basic' => \App\Models\Currency::BASIC_ENABLED])->first();

        $return = '';

        if ($currency->symbol_place == \App\Models\Currency::SYMBOL_PLACE_BEFORE_PRICE) {
            $return .= $currency->symbol . ' ';
        }

        if ($decimals === null) $decimals = $currency->decimals;

        $return .= number_format(str_replace(',', '.', $price), $decimals, $currency->dec_point, $currency->thousands_sep);

        if ($currency->symbol_place == \App\Models\Currency::SYMBOL_PLACE_AFTER_PRICE) {
            $return .= ' ' . $currency->symbol;
        }

        return $return;
    }


    public static function fillUsing($request, $model, $attribute, $requestAttribute)
    {
        $model->{$attribute} = str_replace(',', '.', $request->input($attribute));
    }

}
