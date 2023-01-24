# Laravel Nova 4 Currency field



## Requirements

- `laravel/nova: ^4.0`


## Installation

```bash
composer require wamesk/laravel-nova-currency
```

```bash
php artisan vendor:publish --provider="Wame\LaravelNovaCurrency\PackageServiceProvider"
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
    'App\Models\Currency' => 'App\Policies\CurrencyPolicy',
];
```

## Usage

```php
BelongsTo::make(__('customer.field.currency'), 'currency', Currency::class)
    ->help(__('customer.field.currency.help'))
    ->withoutTrashed()
```

## Updating the exchange rates

This package also includes a scheduling command to start updating the exchange rates every weekday at 16:15.

[Running The Scheduler](https://laravel.com/docs/9.x/scheduling#running-the-scheduler)
