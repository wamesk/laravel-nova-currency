<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaCurrency\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Sushi\Sushi;

/**
 * 
 *
 * @property string|null $id
 * @property string|null $title
 * @property string|null $symbol
 * @property string|null $symbol_place
 * @property int|null $decimals
 * @property string|null $decimal_separator
 * @property string|null $thousands_separator
 * @property string|null $basic
 * @property float|null $coefficient
 * @property Carbon|null $updated_at
 * @method static Builder|Currency newModelQuery()
 * @method static Builder|Currency newQuery()
 * @method static Builder|Currency query()
 * @method static Builder|Currency whereBasic($value)
 * @method static Builder|Currency whereCoefficient($value)
 * @method static Builder|Currency whereDecimalSeparator($value)
 * @method static Builder|Currency whereDecimals($value)
 * @method static Builder|Currency whereId($value)
 * @method static Builder|Currency whereSymbol($value)
 * @method static Builder|Currency whereSymbolPlace($value)
 * @method static Builder|Currency whereThousandsSeparator($value)
 * @method static Builder|Currency whereTitle($value)
 * @method static Builder|Currency whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Currency extends Model
{
    use HasFactory;
    use Sushi;
    use HasUlids;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected array $schema = [
        'id' => 'string',
        'title' => 'string',
        'symbol' => 'string',
        'symbol_place' => 'string',
        'decimals' => 'integer',
        'decimal_separator' => 'string',
        'thousands_separator' => 'string',
        'basic' => 'string',
        'coefficient' => 'float',
    ];

    public string $fileName = 'currencies.csv';

    public function getRows(): array
    {
        if (!Storage::disk('local')->exists($this->fileName)) {
            return [];
        }

        $values = array_map('str_getcsv', explode("\n", Storage::disk('local')->get($this->fileName)));

        $keys = array_shift($values);

        $data = [];

        foreach ($values as $value) {
            if (count($keys) !== count($value)) {
                continue;
            }
            $data[] = array_combine($keys, $value);
        }

        return $data;
    }
}
