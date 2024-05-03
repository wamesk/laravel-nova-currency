<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Nova;

use InteractionDesignFoundation\HtmlCard\HtmlCard;

class CurrencyImportCard
{
    public static function make(): HtmlCard
    {
        return (new HtmlCard())->width('full')
            ->html('<div class="flex space-x-3 justify-between w-100">'
                . '<div class="flex space-x-3 items-center">'
                . '<svg xmlns="http://www.w3.org/2000/svg" class="inline-block mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
                . ' ' . __('laravel-nova-currency::currency.import.description') . ' '
                . '<a size="xs" class="inline-block text-xs" href="https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/html/index.en.html" target="_blank">'
                . '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>'
                . '</a>'
                . '</div>'
                . '<a href="/currency/import" size="md" class="flex-shrink-0 shadow rounded focus:outline-none ring-primary-200 dark:ring-gray-600 focus:ring bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white dark:text-gray-800 inline-flex items-center font-bold px-4 h-9 text-sm flex-shrink-0" dusk="create-button">'
                . __('laravel-nova-currency::currency.import.button')
                . '</a>'
                . '</div>');
    }
}
