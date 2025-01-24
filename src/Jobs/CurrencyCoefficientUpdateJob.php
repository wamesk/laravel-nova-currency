<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Wame\LaravelNovaCurrency\Actions\CurrencyCoefficientUpdateAction;

class CurrencyCoefficientUpdateJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        resolve(CurrencyCoefficientUpdateAction::class)->handle();
    }
}
