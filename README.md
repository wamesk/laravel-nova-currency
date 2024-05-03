# Laravel Nova 4 Currency



## Requirements

- `laravel/nova: ^4.0`


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

Add Policy to `./app/Providers/AuthServiceProvider.php`

```php
protected $policies = [
    'Wame\LaravelNovaCurrency\Models\Currency' => 'src\Policies\CurrencyPolicy',
];
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

This package also includes a scheduling command to start updating the exchange rates every weekday at 16:15.

[Running The Scheduler](https://laravel.com/docs/9.x/scheduling#running-the-scheduler)
