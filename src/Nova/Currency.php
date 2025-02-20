<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Nova;

use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Tabs\Tab;
use Nette\Utils\Strings;

class Currency extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static string $model = \Wame\LaravelNovaCurrency\Models\Currency::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    public function title(): string
    {
        return $this->id . ' - ' . $this->title . ' (' . $this->symbol . ')';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'symbol', 'title',
    ];

    public static function indexQuery(NovaRequest $request, $query): Builder
    {
        if ($request->viaRelationship) {
            return self::relatableQuery($request, $query);
        }

        if (empty($request->get('orderBy'))) {
            $query->getQuery()->orders = [];

            return $query->orderByDesc('basic')->orderBy('id');
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
            Tab::group(null, [
                Tab::make(__('laravel-nova-currency::currency.singular'), [
                    ID::make()
                        ->help(__('laravel-nova-currency::currency.field.code.help'))
                        ->sortable()
                        ->rules('required')
                        ->readonly()
                        ->showOnPreview()
                        ->showWhenPeeking(),

                    Text::make(__('laravel-nova-currency::currency.field.symbol'), 'symbol')
                        ->help(__('laravel-nova-currency::currency.field.symbol.help'))
                        ->sortable()
                        ->filterable()
                        ->rules('required')
                        ->showOnPreview()
                        ->showWhenPeeking(),

                    Text::make(__('laravel-nova-currency::currency.field.title'), 'title')
                        ->help(__('laravel-nova-currency::currency.field.title.help'))
                        ->sortable()
                        ->filterable()
                        ->rules('required')
                        ->showOnPreview()
                        ->showWhenPeeking(),

                    Text::make(__('laravel-nova-currency::currency.field.coefficient'), 'coefficient')
                        ->help(__('laravel-nova-currency::currency.field.coefficient.help'))
                        ->sortable()
                        ->filterable()
                        ->rules('required')
                        ->showOnPreview(),

                    DateTime::make(__('laravel-nova-currency::currency.field.updated_at'), 'updated_at')
                        ->sortable()
                        ->showOnPreview(),

                    Boolean::make(__('laravel-nova-currency::currency.field.basic'), 'basic')
                        ->sortable()
                        ->filterable()
                        ->showOnPreview(),
                ]),
            ])->withToolbar(),
        ];
    }

    public function authorizedToUpdate(Request $request): false
    {
        return false;
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

    public static function label(): string
    {
        return __('laravel-nova-currency::currency.label');
    }
}
