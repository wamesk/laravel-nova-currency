<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;
use Wame\LaravelNovaCurrency\Jobs\CurrencyCoefficientUpdateJob;
use Wame\LaravelNovaCurrency\Models\Currency;
use Wame\LaravelNovaCurrency\Policies\CurrencyPolicy;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        Nova::resources([
            \Wame\LaravelNovaCurrency\Nova\Currency::class
        ]);

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'laravel-nova-currency');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            // Add schedule
            $this->app->booted(function (): void {
                $schedule = $this->app->make(Schedule::class);
                $schedule->job(new CurrencyCoefficientUpdateJob())->weekdays()->dailyAt('16:15');
            });
        }

        // Add route
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        // Add policy
        Gate::policy(Currency::class, CurrencyPolicy::class);
    }
}
