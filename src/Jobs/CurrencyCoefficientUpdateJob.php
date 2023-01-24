<?php

namespace Wame\LaravelNovaCurrency\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Wame\LaravelNovaCurrency\Controllers\CurrencyController;


class CurrencyCoefficientUpdateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        CurrencyController::currencyCoefficientUpdate(false);
    }

}
