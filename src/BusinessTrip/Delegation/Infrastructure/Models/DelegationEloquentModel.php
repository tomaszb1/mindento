<?php

namespace Src\BusinessTrip\Delegation\Infrastructure\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\App;
use Src\Common\Infrastructure\Models\CountryCodeEloquentModel;
use Src\BusinessTrip\Delegation\Infrastructure\Services\CalculateDelegationAmountDue;
use Src\BusinessTrip\User\Infrastructure\Models\UserEloquentModel;

/**
 * Class DelegationEloquentModel
 *  @property string $user_id
 *  @property string $country_code
 *  @property Carbon $start
 *  @property Carbon $end
 *  @property CountryCodeEloquentModel $countryCode
 *  @property UserEloquentModel $user
 * @property int $amount_due
 */
class DelegationEloquentModel extends Model
{
    protected $table = 'delegations';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'start',
        'end',
        'country_code',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(UserEloquentModel::class, 'user_id');
    }

    public function countryCode(): HasOne
    {
        return $this->hasOne(
            CountryCodeEloquentModel::class,
            'code',
            'country_code'
        );
    }

    public function getAmountDueAttribute(): int
    {
        return App::make(CalculateDelegationAmountDue::class)->calculate($this);
    }
}
