<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Schema;
use Wame\LaravelNovaCurrency\Models\Currency;


return new class extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            if (Builder::$defaultMorphKeyType === 'ulid') {
                $table->ulid('id')->primary();
            } elseif (Builder::$defaultMorphKeyType === 'uuid') {
                $table->uuid('id')->primary();
            } else {
                $table->id('id')->primary();
            }

            $table->char('code', 3);
            $table->string('title', 10);
            $table->string('symbol', 3);
            $table->enum('symbol_place', array_keys(config('wame-currency.symbol_place')))->default(Currency::SYMBOL_PLACE_BEFORE_PRICE);
            $table->char('decimals', 1)->default(2);
            $table->enum('decimal_separator', array_keys(config('wame-currency.decimal_separator')))->default(Currency::DECIMAL_SEPARATOR_COMMA);
            $table->enum('thousands_separator', array_keys(config('wame-currency.thousands_separator')))->default(Currency::THOUSANDS_SEPARATOR_SPACE);
            $table->unsignedFloat('coefficient', null, null)->default(0);
            $table->boolean('basic')->default(Currency::BASIC_DISABLED);
            $table->boolean('status')->default(Currency::STATUS_ENABLED);
            $table->timestamps();

            $table->unique('code');
            $table->index('symbol');
            $table->index('title');
            $table->index('status');
            $table->index(['status', 'code']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }

};
