<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Providers;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;
use Wame\LaravelNovaCurrency\Jobs\CurrencyCoefficientUpdateJob;

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
    }
}
