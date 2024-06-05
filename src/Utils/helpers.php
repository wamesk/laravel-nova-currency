<?php

use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

if (!function_exists('currency_format')) {
    function currency_format(Money $money): string
    {
        $currencies = new ISOCurrencies();
        $numberFormatter = new NumberFormatter(env('APP_LOCALE'), NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

        return $moneyFormatter->format($money);
    }
}
