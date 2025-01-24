<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Actions;

use Illuminate\Support\Facades\Storage;
use Wame\LaravelNovaCurrency\Models\Currency;

class CurrencyCoefficientUpdateAction
{
    public function handle()
    {
        $xml = simplexml_load_file('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

        $data = [];
        foreach ($xml->Cube->Cube->Cube as $rate) {
            $data[((string)($rate['currency']))] = ((string)($rate['rate']));
        }

        /** @var Currency $currencyModel */
        $currencyModel = resolve(Currency::class);
        $currencies = $currencyModel->all();

        $keys = array_keys($currencyModel->getSchema());

        $newCurrencies = [$keys];

        if (!in_array('updated_at', $newCurrencies[0])) {
            $newCurrencies[0][] = 'updated_at';
        }

        foreach ($currencies as $currency) {
            $newCurrency = [];
            foreach ($keys as $key) {
                $newCurrency[$key] = $currency->$key ?? null;
            }
            $newCurrency['coefficient'] = $data[$currency->id] ?? null;
            if ('EUR' === $newCurrency['id']) {
                $newCurrency['coefficient'] = 1.0;
            }
            $newCurrency['updated_at'] = now()->format('Y-m-d H:i:s');
            $newCurrencies[] = $newCurrency;
        }

        Storage::disk('local')->put($currencyModel->fileName,
            implode("\n", array_map(function ($row) {
                return implode(',', $row);
            }, $newCurrencies)),
        );
    }

}
