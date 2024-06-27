<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Database\Seeders;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Storage;
use Wame\LaravelNovaCurrency\Models\Currency;
use Illuminate\Database\Seeder;

/**
 * php artisan db:seed --class='Wame\LaravelNovaCurrency\Database\Seeders\CurrencySeeder'
 */
class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /** @var Currency $currencyModel */
        $currencyModel = resolve(Currency::class);

        $currencies = [
            ['id', 'title', 'locale', 'symbol', 'symbol_place', 'decimals', 'decimal_separator', 'thousands_separator', 'basic', 'coefficient'],
            ['id' => 'EUR', 'title' => 'Euro', 'locale' => 'de_DE', 'symbol' => '€', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '1', 'thousands_separator' => '1', 'basic' => '1', 'coefficient' => 1.0],
            ['id' => 'CZK', 'title' => 'Koruna', 'locale' => 'cs_CZ', 'symbol' => 'Kč', 'symbol_place' => '2', 'decimals' => 0, 'decimal_separator' => '1', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'USD', 'title' => 'Dollar', 'locale' => 'en_US', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'coefficient' => null],
            ['id' => 'JPY', 'title' => 'Yen', 'locale' => 'ja_JP', 'symbol' => '¥', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'BGN', 'title' => 'Lev', 'locale' => 'bg_BG', 'symbol' => 'лв', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'DKK', 'title' => 'Krone', 'locale' => 'da_DK', 'symbol' => 'kr', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'GBP', 'title' => 'Pound', 'locale' => 'en_GB', 'symbol' => '£', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'coefficient' => null],
            ['id' => 'HUF', 'title' => 'Forint', 'locale' => 'hu_HU', 'symbol' => 'Ft', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'PLN', 'title' => 'Zloty', 'locale' => 'pl_PL', 'symbol' => 'zł', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'RON', 'title' => 'Leu', 'locale' => 'ro_RO', 'symbol' => 'lei', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'SEK', 'title' => 'Krona', 'locale' => 'sv_SE', 'symbol' => 'kr', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'CHF', 'title' => 'Franc', 'locale' => 'de_CH', 'symbol' => 'CHF', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'ISK', 'title' => 'Koruna', 'locale' => 'is_IS', 'symbol' => 'kr', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'NOK', 'title' => 'Krone', 'locale' => 'nb_NO', 'symbol' => 'kr', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'HRK', 'title' => 'Kuna', 'locale' => 'hr_HR', 'symbol' => 'kn', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'RUB', 'title' => 'Ruble', 'locale' => 'ru_RU', 'symbol' => '₽', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'TRY', 'title' => 'Lira', 'locale' => 'tr_TR', 'symbol' => 'YTL', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'AUD', 'title' => 'Dollar', 'locale' => 'en_AU', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'coefficient' => null],
            ['id' => 'BRL', 'title' => 'Real', 'locale' => 'pt_BR', 'symbol' => 'R$', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'CAD', 'title' => 'Dollar', 'locale' => 'en_CA', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'coefficient' => null],
            ['id' => 'CNY', 'title' => 'Yuan', 'locale' => 'zh_CN', 'symbol' => '¥', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'HKD', 'title' => 'Dollar', 'locale' => 'zh_HK', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'coefficient' => null],
            ['id' => 'IDR', 'title' => 'Rupiah', 'locale' => 'id_ID', 'symbol' => 'Rp', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'ILS', 'title' => 'Shekel', 'locale' => 'he_IL', 'symbol' => '₪', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'INR', 'title' => 'Rupee', 'locale' => 'hi_IN', 'symbol' => '₹', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'KRW', 'title' => 'Won', 'locale' => 'ko_KR', 'symbol' => '₩', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'MXN', 'title' => 'Peso', 'locale' => 'es_MX', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'coefficient' => null],
            ['id' => 'MYR', 'title' => 'Ringgit', 'locale' => 'ms_MY', 'symbol' => 'RM', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'NZD', 'title' => 'Dollar', 'locale' => 'en_NZ', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'coefficient' => null],
            ['id' => 'PHP', 'title' => 'Peso', 'locale' => 'fil_PH', 'symbol' => '₱', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'SGD', 'title' => 'Dollar', 'locale' => 'en_SG', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'coefficient' => null],
            ['id' => 'THB', 'title' => 'Baht', 'locale' => 'th_TH', 'symbol' => '฿', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
            ['id' => 'ZAR', 'title' => 'Rand', 'locale' => 'en_ZA', 'symbol' => 'R', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'coefficient' => null],
        ];

        $xml = simplexml_load_file('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

        $date = CarbonImmutable::now();

        $data = [];
        foreach ($xml->Cube->Cube->Cube as $rate) {
            $data[((string)($rate['currency']))] = ((string)($rate['rate']));
        }

        $now = CarbonImmutable::now()->format('Y-m-d H:i:s');

        foreach ($currencies as $index => $currency) {
            if (0 === $index) {
                continue;
            }

            if (isset($data[$currency['id']])) {
                $currencies[$index]['coefficient'] = (float) $data[$currency['id']];
            }

            $currencies[$index]['updated_at'] = $now;
        }

        Storage::disk('local')->put($currencyModel->fileName,
            implode("\n", array_map(function ($row) {
                return implode(',', $row);
            }, $currencies)),
        );
    }
}
