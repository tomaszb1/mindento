<?php
declare(strict_types=1);

namespace Src\BusinessTrip\User\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserEloquentModel
 *  @property int $id
 * */

class UserEloquentModel extends Model
{
    protected $table = 'users';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
    ];
}
