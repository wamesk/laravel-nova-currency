<?php

declare(strict_types = 1);

namespace App\Nova;

use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Nette\Utils\Strings;
use Wame\LaravelNovaCurrency\Nova\CurrencyImportCard;
use Wame\Utils\Helpers\Translator;

class Currency extends BaseResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Currency::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = ['code', ' - ', 'title', ' - ', 'symbol'];

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'code', 'symbol', 'title',
    ];

    public static function indexQuery(NovaRequest $request, $query): Builder
    {
        if ($request->viaRelationship) {
            return self::relatableQuery($request, $query);
        }
        if (empty($request->get('orderBy'))) {
            $query->getQuery()->orders = [];

            return $query->orderBy('code', 'asc');
        }

        return $query;
    }

    public static function relatableQuery(NovaRequest $request, $query): Builder
    {
        if (Strings::contains($request->path(), 'associatable/currency')) {
            $query->where('status', \App\Models\Currency::STATUS_ENABLED);
        }

        return $query;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [
            Tabs::make(__('currency.detail', ['title' => $this->title ?: '']), [
                Tab::make(__('currency.singular'), [
                    ID::make()->onlyOnForms(),

                    Text::make(__('currency.field.code'), 'code')
                        ->help(__('currency.field.code.help'))
                        ->sortable()
                        ->filterable()
                        ->rules('required')
                        ->readonly()
                        ->showOnPreview(),

                    Text::make(__('currency.field.symbol'), 'symbol')
                        ->help(__('currency.field.symbol.help'))
                        ->sortable()
                        ->filterable()
                        ->rules('required')
                        ->showOnPreview(),

                    Text::make(__('currency.field.title'), 'title')
                        ->help(__('currency.field.title.help'))
                        ->sortable()
                        ->filterable()
                        ->rules('required')
                        ->showOnPreview(),

                    Text::make(__('currency.field.coefficient'), 'coefficient')
                        ->help(__('currency.field.coefficient.help'))
                        ->sortable()
                        ->filterable()
                        ->rules('required')
                        ->showOnPreview(),

                    Select::make(__('currency.field.symbol_place'), 'symbol_place')
                        ->help(__('currency.field.symbol_place.help'))
                        ->options(Translator::arrayValue(config('wame-currency.symbol_place')))
                        ->rules('required')
                        ->onlyOnForms(),

                    Number::make(__('currency.field.decimals'), 'decimals')
                        ->help(__('currency.field.decimals.help'))
                        ->min(0)
                        ->max(9)
                        ->rules('required')
                        ->onlyOnForms(),

                    Select::make(__('currency.field.decimal_separator'), 'decimal_separator')
                        ->help(__('currency.field.decimal_separator.help'))
                        ->options(Translator::arrayValue(config('wame-currency.decimal_separator')))
                        ->rules('required')
                        ->onlyOnForms(),

                    Select::make(__('currency.field.thousands_separator'), 'thousands_separator')
                        ->help(__('currency.field.thousands_separator.help'))
                        ->options(Translator::arrayValue(config('wame-currency.thousands_separator')))
                        ->rules('required')
                        ->onlyOnForms(),

                    DateTime::make(__('currency.field.updated_at'), 'updated_at')
                        ->sortable()
                        ->exceptOnForms()
                        ->showOnPreview(),

                    Boolean::make(__('currency.field.basic'), 'basic')
                        ->sortable()
                        ->filterable()
                        ->exceptOnForms()
                        ->showOnPreview(),

                    Boolean::make(__('currency.field.status'), 'status')
                        ->help(__('currency.field.status.help'))
                        ->default(\App\Models\Currency::STATUS_ENABLED)
                        ->sortable()
                        ->filterable()
                        ->showOnPreview(),
                ]),
            ])->withToolbar(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request): array
    {
        return [
            CurrencyImportCard::make(),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
