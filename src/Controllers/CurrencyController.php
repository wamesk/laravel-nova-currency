<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Wame\LaravelNovaCurrency\Enums\CurrencyStatusEnum;
use Wame\LaravelNovaCurrency\Models\Currency;
use Carbon\CarbonImmutable;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Http\Requests\ResourceIndexRequest;

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

        $data = [];
        foreach ($xml->Cube->Cube->Cube as $rate) {
            $data[((string)($rate['currency']))] = ((string)($rate['rate']));
        }

        /** @var Currency $currencyModel */
        $currencyModel = resolve(Currency::class);
        $currencies = $currencyModel->all();

        $keys = array_keys($currencyModel->getSchema());

        $newCurrencies = [array_merge($keys, ['updated_at'])];
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

        if ($redirect) {
            return redirect()->back();
        }
    }

    /**
     * @return array
     */
    public static function getListForSelect(): array
    {
        $list = self::model()->where(['status' => CurrencyStatusEnum::ENABLED->value])->orderBy('id');

        $return = [];

        foreach ($list->get() as $item) {
            $return[$item->id] = $item->id . ' - ' . $item->title . ' (' . $item->symbol . ')';
        }

        natcasesort($return);

        return $return;
    }

    /**
     * Helper for display using
     *
     * @param NovaRequest $request
     * @param Currency $model
     *
     * @return string|null
     */
    public static function displayUsing($request, $model): ?string
    {
        if (!$model->currency_code) {
            return null;
        } elseif ($request instanceof ResourceIndexRequest) {
            return $model->currency_code;
        } else {
            $currency = $model->currency;

            return $model->currency_code . ' - ' . $currency->title . ' (' . $currency->symbol . ')';
        }
    }

}
