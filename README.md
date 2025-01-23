# Laravel Nova 5 Currency



## Requirements

- `laravel/nova: ^5.0`


## Installation

```bash
composer require wamesk/laravel-nova-currency
```

```bash
php artisan migrate
```

```bash
php artisan db:seed --class=CurrencySeeder
```

## Usage

```php
Select::make(__('laravel-nova-currency::customer.field.currency'), 'currency_code')
    ->help(__('laravel-nova-currency::customer.field.currency.help'))
    ->options(fn () => CurrencyController::getListForSelect())
    ->searchable()
    ->required()
    ->rules('required')
    ->onlyOnForms(),

BelongsTo::make(__('laravel-nova-currency::customer.field.currency'), 'currency', Currency::class)
    ->displayUsing(fn () => CurrencyController::displayUsing($request, $this))
    ->sortable()
    ->filterable()
    ->showOnPreview()
    ->exceptOnForms(),
```

## Updating the exchange rates

This package also includes a scheduling command to start updating the exchange rates from [European Central Bank](https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/html/index.en.html) every weekday at 16:15.

[Running The Scheduler](https://laravel.com/docs/9.x/scheduling#running-the-scheduler)
