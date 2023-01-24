<?php

return [
    'symbol_place' => [
        \Wame\LaravelNovaCurrency\Models\Currency::SYMBOL_PLACE_BEFORE_PRICE => 'currency.field.symbol_place.before',
        \Wame\LaravelNovaCurrency\Models\Currency::SYMBOL_PLACE_AFTER_PRICE => 'currency.field.symbol_place.after',
    ],
    'decimal_separator' => [
        \Wame\LaravelNovaCurrency\Models\Currency::DECIMAL_SEPARATOR_COMMA => 'currency.field.decimal_separator.comma',
        \Wame\LaravelNovaCurrency\Models\Currency::DECIMAL_SEPARATOR_DOT => 'currency.field.decimal_separator.dot',
    ],
    'thousands_separator' => [
        \Wame\LaravelNovaCurrency\Models\Currency::THOUSANDS_SEPARATOR_SPACE => 'currency.field.thousands_separator.space',
        \Wame\LaravelNovaCurrency\Models\Currency::THOUSANDS_SEPARATOR_DOT => 'currency.field.thousands_separator.dot',
    ],
];
