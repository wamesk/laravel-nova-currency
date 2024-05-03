<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Utils;

use Wame\LaravelNovaCurrency\Enums\CurrencyBasicEnum;
use Wame\LaravelNovaCurrency\Enums\DecimalSeparatorEnum;
use Wame\LaravelNovaCurrency\Enums\SymbolPlacePriceEnum;
use Wame\LaravelNovaCurrency\Enums\ThousandsSeparatorEnum;
use Wame\LaravelNovaCurrency\Models\Currency;

class CurrencyHelper
{
    public static function format($price, $currency, $decimals = null): string
    {
        if (is_numeric($currency)) {
            $currency = \Wame\LaravelNovaCurrency\Models\Currency::find($currency);
        } elseif (is_string($currency)) {
            $currency = \Wame\LaravelNovaCurrency\Models\Currency::whereCode($currency)->first();
        }
        if (!$currency) {
            $currency = \Wame\LaravelNovaCurrency\Models\Currency::whereBasic([CurrencyBasicEnum::ENABLED->value])->first();
        }

        $return = '';

        if (SymbolPlacePriceEnum::BEFORE->value === $currency->symbol_place) {
            $return .= $currency->symbol . ' ';
        }

        if (null === $decimals) {
            $decimals = $currency->decimals;
        }

        $decPoint = $currency->dec_point == DecimalSeparatorEnum::COMMA->value ? ',' : '.';
        $thousandsSep = $currency->thousands_sep == ThousandsSeparatorEnum::DOT->value ? '.' : ' ';

        $return .= number_format((float) str_replace(',', '.', (string) $price), (int) $decimals, $decPoint, $thousandsSep);

        if (SymbolPlacePriceEnum::AFTER->value === $currency->symbol_place) {
            $return .= ' ' . $currency->symbol;
        }

        return $return;
    }

    public static function fillUsing($request, $model, $attribute, $requestAttribute): void
    {
        $model->{$attribute} = str_replace(',', '.', $request->input($attribute));
    }

    public static function exchange($price, $from, $to)
    {
        if ($from == $to) {
            return $price;
        }

        if ($from != 'EUR') {
            $fromCurrency = Currency::where('code', $from)->select('coefficient')->first();
            $price = $price * $fromCurrency->coefficient;
        }

        $toCurrency = Currency::where('code', $to)->select('coefficient')->first();

        return $price * $toCurrency->coefficient;
    }

}
