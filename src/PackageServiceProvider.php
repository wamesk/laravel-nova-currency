<?php

namespace Wame\LaravelNovaCurrency;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;
use Wame\LaravelNovaCurrency\Jobs\CurrencyCoefficientUpdateJob;
use Wame\Utils\Helpers\File;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/wame-currency.php', 'wame-currency');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Export model
            $model = app_path('Models/Currency.php');
            if (!file_exists($model)) $this->createModel($model);

            // Export config
            $this->publishes([__DIR__ . '/../config/wame-currency.php' => config_path('wame-currency.php')], ['config', 'wame', 'currency']);

            // Export Nova resource
            $this->publishes([__DIR__ . '/../app/Nova/Currency.php' => app_path('Nova/Currency.php')], ['nova', 'wame', 'currency']);

            // Export policy
            $this->publishes([__DIR__ . '/../app/Policies/CurrencyPolicy.php' => app_path('Policies/CurrencyPolicy.php')], ['policy', 'wame', 'currency']);

            // Export migration
            $this->publishes([__DIR__ . '/../database/migrations/2023_01_23_083015_create_currencies_table.php' => database_path('migrations/2023_01_23_083015_create_currencies_table.php')], ['migrations', 'wame', 'currency']);

            // Export seeder
            $this->publishes([__DIR__ . '/../database/seeders/CurrencySeeder.php' => database_path('seeders/CurrencySeeder.php')], ['seeders', 'wame', 'currency']);

            // Export lang
            $this->publishes([__DIR__ . '/../resources/lang/sk/currency.php' => resource_path('lang/sk/currency.php')], ['langs', 'wame', 'currency']);

            // Schedule
            $this->app->booted(function () {
                $schedule = $this->app->make(Schedule::class);
                $schedule->job(new CurrencyCoefficientUpdateJob())->weekdays()->dailyAt('16:15');
            });
        }
    }


    private function createModel($model)
    {
        $file = fopen($model, "w");
        $idType = config('wame-commands.id-type');

        if ($idType === 'ulid') {
            $use = "use Illuminate\Database\Eloquent\Concerns\HasUlids;\n";
            $use2 = "    use HasUlids;\n";
        } elseif ($idType === 'uuid') {
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
