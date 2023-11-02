<?php
declare(strict_types=1);

namespace Src\Common\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CountryCodeEloquentModel
 *  @property string $code
 *  @property int $amount
 *  @property string $currency
 * */
class CountryCodeEloquentModel extends Model
{
    protected $table = 'country_codes';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'amount',
        'currency'
    ];
}
