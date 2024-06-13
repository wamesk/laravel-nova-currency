<?php

namespace Wame\LaravelNovaCurrency\Casts;

use Exception;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Money\Money;

class MoneyCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): Money
    {
        if (!isset($value)) {
            $value = 0;
        }

        return Money::EUR($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param array<string, mixed> $attributes
     * @throws Exception
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): int
    {
        if (!($value instanceof Money)) {
            if (is_string($value)) {
                $value = (float) (str_replace(',', '.', $value));
            }

            $value = Money::EUR((int) ($value * 100));
        }

        return (int) $value->getAmount();
    }
}
