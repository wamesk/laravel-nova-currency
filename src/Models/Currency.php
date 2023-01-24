<?php

namespace Wame\LaravelNovaCurrency\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Currency extends Model
{
    use HasFactory;


    const SYMBOL_PLACE_BEFORE_PRICE = '1';
    const SYMBOL_PLACE_AFTER_PRICE = '2';

    const DECIMAL_SEPARATOR_COMMA = '1';
    const DECIMAL_SEPARATOR_DOT = '2';

    const THOUSANDS_SEPARATOR_SPACE = '1';
    const THOUSANDS_SEPARATOR_DOT = '2';

    const BASIC_DISABLED = 0;
    const BASIC_ENABLED = 1;

    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;


    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

}
