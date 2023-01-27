<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;


    public const SYMBOL_PLACE_BEFORE_PRICE = '1';
    public const SYMBOL_PLACE_AFTER_PRICE = '2';

    public const DECIMAL_SEPARATOR_COMMA = '1';
    public const DECIMAL_SEPARATOR_DOT = '2';

    public const THOUSANDS_SEPARATOR_SPACE = '1';
    public const THOUSANDS_SEPARATOR_DOT = '2';

    public const BASIC_DISABLED = 0;
    public const BASIC_ENABLED = 1;

    public const STATUS_DISABLED = 0;
    public const STATUS_ENABLED = 1;


    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
