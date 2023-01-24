<?php

namespace Database\Seeders;

use App\Models\Currency;
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
    public function run()
    {
        $items = [
            ['code' => 'EUR', 'title' => 'Euro', 'symbol' => '€', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '1', 'thousands_separator' => '1', 'basic' => '1'],
            ['code' => 'CZK', 'title' => 'Koruna', 'symbol' => 'Kč', 'symbol_place' => '2', 'decimals' => 0, 'decimal_separator' => '1', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'USD', 'title' => 'Dollar', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0'],
            ['code' => 'JPY', 'title' => 'Yen', 'symbol' => '¥', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'BGN', 'title' => 'Lev', 'symbol' => 'лв', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'DKK', 'title' => 'Krone', 'symbol' => 'kr', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'GBP', 'title' => 'Pound', 'symbol' => '£', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0'],
            ['code' => 'HUF', 'title' => 'Forint', 'symbol' => 'Ft', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'PLN', 'title' => 'Zloty', 'symbol' => 'zł', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'RON', 'title' => 'Leu', 'symbol' => 'lei', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'SEK', 'title' => 'Krona', 'symbol' => 'kr', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'CHF', 'title' => 'Franc', 'symbol' => 'CHF', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'ISK', 'title' => 'Koruna', 'symbol' => 'kr', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'NOK', 'title' => 'Krone', 'symbol' => 'kr', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'HRK', 'title' => 'Kuna', 'symbol' => 'kn', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'RUB', 'title' => 'Ruble', 'symbol' => '₽', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'TRY', 'title' => 'Lira', 'symbol' => 'YTL', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'AUD', 'title' => 'Dollar', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0'],
            ['code' => 'BRL', 'title' => 'Real', 'symbol' => 'R$', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'CAD', 'title' => 'Dollar', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0'],
            ['code' => 'CNY', 'title' => 'Yuan', 'symbol' => '¥', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'HKD', 'title' => 'Dollar', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0'],
            ['code' => 'IDR', 'title' => 'Rupiah', 'symbol' => 'Rp', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'ILS', 'title' => 'Shekel', 'symbol' => '₪', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'INR', 'title' => 'Rupee', 'symbol' => '₹', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'KRW', 'title' => 'Won', 'symbol' => '₩', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'MXN', 'title' => 'Peso', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0'],
            ['code' => 'MYR', 'title' => 'Ringgit', 'symbol' => 'RM', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'NZD', 'title' => 'Dollar', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0'],
            ['code' => 'PHP', 'title' => 'Peso', 'symbol' => '₱', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'SGD', 'title' => 'Dollar', 'symbol' => '$', 'symbol_place' => '1', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '2', 'basic' => '0'],
            ['code' => 'THB', 'title' => 'Baht', 'symbol' => '฿', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0'],
            ['code' => 'ZAR', 'title' => 'Rand', 'symbol' => 'R', 'symbol_place' => '2', 'decimals' => 2, 'decimal_separator' => '2', 'thousands_separator' => '1', 'basic' => '0']
        ];

        foreach ($items as $item) {
            if ($item['code'] === 'EUR') $item['coefficient'] = 1;

            Currency::updateOrCreate(['code' => $item['code']], $item);
        }
    }

}
