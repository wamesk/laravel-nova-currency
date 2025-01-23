<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Services;

use Laravel\Nova\Http\Requests\ResourceIndexRequest;
use Wame\LaravelNovaCurrency\Models\Currency;

class CurrencyService
{
    public function getListForSelect(): array
    {
        $list = Currency::query()->orderBy('id');

        $return = [];

        foreach ($list->get() as $item) {
            $return[$item->id] = $item->id . ' - ' . $item->title . ' (' . $item->symbol . ')';
        }

        natcasesort($return);

        return $return;
    }

    public function displayUsing($request, $model): ?string
    {
        if (!$model->currency_id) {
            return null;
        } elseif ($request instanceof ResourceIndexRequest) {
            return $model->currency_id;
        } else {
            $currency = $model->currency;

            return $model->currency_id . ' - ' . $currency->title . ' (' . $currency->symbol . ')';
        }
    }

}
