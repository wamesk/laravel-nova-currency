<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;
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
        $this->mergeConfigFrom(__DIR__ . '/../config/wame-currency.php', 'wame-currency');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            // Export model
            $model = app_path('Models/Currency.php');
            if (!file_exists($model)) {
                $this->createModel($model);
            }

            // Export config
            $this->publishes([__DIR__ . '/../config/wame-currency.php' => config_path('wame-currency.php')], ['config', 'wame', 'currency']);

            // Export Nova resource
            $this->publishes([__DIR__ . '/../app/Nova' => app_path('Nova')], ['nova', 'wame', 'currency']);

            // Export policy
            $this->publishes([__DIR__ . '/../app/Policies' => app_path('Policies')], ['policy', 'wame', 'currency']);

            // Export migration
            $this->publishes([__DIR__ . '/../database/migrations' => database_path('migrations')], ['migrations', 'wame', 'currency']);

            // Export seeder
            $this->publishes([__DIR__ . '/../database/seeders' => database_path('seeders')], ['seeders', 'wame', 'currency']);

            // Export lang
            $this->publishes([__DIR__ . '/../resources/lang' => resource_path('lang')], ['langs', 'wame', 'currency']);

            // Add schedule
            $this->app->booted(function (): void {
                $schedule = $this->app->make(Schedule::class);
                $schedule->job(new CurrencyCoefficientUpdateJob())->weekdays()->dailyAt('16:15');
            });
        }

        // Add route
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }


    private function createModel($model): void
    {
        $file = fopen($model, 'w');
        $idType = config('wame-commands.id-type');

        if ('ulid' === $idType) {
            $use = "use Illuminate\Database\Eloquent\Concerns\HasUlids;\n";
            $use2 = "    use HasUlids;\n";
        } elseif ('uuid' === $idType) {
            $use = "use Illuminate\Database\Eloquent\Concerns\HasUuids;\n";
            $use2 = "    use HasUuids;\n";
        } else {
            $use = '';
            $use2 = '';
        }

        $lines = [
            "<?php \n",
            "\n",
            "namespace App\Models;\n",
            "\n",
            $use,
            "\n",
            "class Currency extends \Wame\LaravelNovaCurrency\Models\Currency\n",
            "{\n",
            $use2,
            "\n",
            "}\n",
            "\n",
        ];

        fwrite($file, implode('', $lines));
        fclose($file);
    }
}
