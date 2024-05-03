<?php

namespace Wame\LaravelNovaCurrency\Enums;

use Wame\Utils\Enums\ToArray;
use Wame\Utils\Enums\Values;

enum SymbolPlacePriceEnum: string
{
    use ToArray;

    case BEFORE = '1';
    case AFTER = '2';

    public function title(): string
    {
        return match ($this) {
            self::BEFORE => __('laravel-nova-currency::laravel-nova-currency::currency.field.symbol_place.before'),
            self::AFTER => __('laravel-nova-currency::laravel-nova-currency::currency.field.symbol_place.after'),
        };
    }
}
