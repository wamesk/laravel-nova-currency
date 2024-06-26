<?php

use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

if (!function_exists('currency_format')) {
    function currency_format(Money $money): string
    {
        $locale = currency_locale($money->getCurrency()->getCode());

        $currencies = new ISOCurrencies();
        $numberFormatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

        return $moneyFormatter->format($money);
    }
}

if (!function_exists('currency_locale')) {
    function currency_locale(string $currencyCode): string
    {
        return match ($currencyCode) {
            'EUR' => 'de_DE',
            'CZK' => 'cs_CZ',
            'USD' => 'en_US',
            'JPY' => 'ja_JP',
            'BGN' => 'bg_BG',
            'DKK' => 'da_DK',
            'GBP' => 'en_GB',
            'HUF' => 'hu_HU',
            'PLN' => 'pl_PL',
            'RON' => 'ro_RO',
            'SEK' => 'sv_SE',
            'CHF' => 'de_CH',
            'ISK' => 'is_IS',
            'NOK' => 'nb_NO',
            'HRK' => 'hr_HR',
            'RUB' => 'ru_RU',
            'TRY' => 'tr_TR',
            'AUD' => 'en_AU',
            'BRL' => 'pt_BR',
            'CAD' => 'en_CA',
            'CNY' => 'zh_CN',
            'HKD' => 'zh_HK',
            'IDR' => 'id_ID',
            'ILS' => 'he_IL',
            'INR' => 'hi_IN',
            'KRW' => 'ko_KR',
            'MXN' => 'es_MX',
            'MYR' => 'ms_MY',
            'NZD' => 'en_NZ',
            'PHP' => 'fil_PH',
            'SGD' => 'en_SG',
            'THB' => 'th_TH',
            'ZAR' => 'en_ZA',
            default => 'en_US',
        };
    }
}