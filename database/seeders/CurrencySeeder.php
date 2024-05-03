<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Database\Seeders;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Storage;
use Wame\LaravelNovaCurrency\Models\Currency;
use Illuminate\Database\Seeder;

/**
 * php artisan db:seed --class=CurrencySeeder
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
            ['id', 'title', 'symbol', 'symbol_place', 'decimals', 'decimal_separator', 'thousands_separator', 'basic', 'coefficient', 'updated_at'],
            ['id' => 'EUR', 'title' => 'Euro', 'symbol' => '€', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '1', 'thousands_separator' => '1', 'basic' => '1', 'coefficient' => 1.0],
            ['id' => 'CZK', 'title' => 'Koruna', 'symbol' => 'Kč', 'symbol_place' => '2', 'decimals' => 0, 'decimal_separator' => '1', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'USD', 'title' => 'Dollar', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'JPY', 'title' => 'Yen', 'symbol' => '¥', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'BGN', 'title' => 'Lev', 'symbol' => 'лв', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'DKK', 'title' => 'Krone', 'symbol' => 'kr', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'GBP', 'title' => 'Pound', 'symbol' => '£', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'HUF', 'title' => 'Forint', 'symbol' => 'Ft', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'PLN', 'title' => 'Zloty', 'symbol' => 'zł', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'RON', 'title' => 'Leu', 'symbol' => 'lei', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'SEK', 'title' => 'Krona', 'symbol' => 'kr', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'CHF', 'title' => 'Franc', 'symbol' => 'CHF', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'ISK', 'title' => 'Koruna', 'symbol' => 'kr', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'NOK', 'title' => 'Krone', 'symbol' => 'kr', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'HRK', 'title' => 'Kuna', 'symbol' => 'kn', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'RUB', 'title' => 'Ruble', 'symbol' => '₽', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'TRY', 'title' => 'Lira', 'symbol' => 'YTL', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'AUD', 'title' => 'Dollar', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'BRL', 'title' => 'Real', 'symbol' => 'R$', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'CAD', 'title' => 'Dollar', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'CNY', 'title' => 'Yuan', 'symbol' => '¥', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'HKD', 'title' => 'Dollar', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'IDR', 'title' => 'Rupiah', 'symbol' => 'Rp', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'ILS', 'title' => 'Shekel', 'symbol' => '₪', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'INR', 'title' => 'Rupee', 'symbol' => '₹', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'KRW', 'title' => 'Won', 'symbol' => '₩', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'MXN', 'title' => 'Peso', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'MYR', 'title' => 'Ringgit', 'symbol' => 'RM', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'NZD', 'title' => 'Dollar', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'PHP', 'title' => 'Peso', 'symbol' => '₱', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'SGD', 'title' => 'Dollar', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'THB', 'title' => 'Baht', 'symbol' => '฿', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
            ['id' => 'ZAR', 'title' => 'Rand', 'symbol' => 'R', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0', 'currency_coefficient' => null],
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
                $currencies[$index]['currency_coefficient'] = (float) $data[$currency['id']];
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
