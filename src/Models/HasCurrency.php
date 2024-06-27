<?php

namespace Wame\LaravelNovaCurrency\Models;

use Wame\LaravelNovaCurrency\Models\Currency;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasCurrency
{
    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
