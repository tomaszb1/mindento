<?php
declare(strict_types=1);

namespace Src\BusinessTrip\User\Application\Mappers;

use Src\BusinessTrip\User\Domain\Model\User;
use Src\BusinessTrip\User\Infrastructure\Models\UserEloquentModel;

class UserMapper
{
    public static function fromRequest(?int $userId = null): User
    {
        return new User(
            id: $userId,
        );
    }

    public static function fromEloquent(UserEloquentModel $userEloquent): User
    {
        return new User(
            id: $userEloquent->id,
        );
    }

    public static function toEloquent(User $user): UserEloquentModel
    {
        $userEloquent = new UserEloquentModel();
        if ($user->id) {
            $userEloquent = UserEloquentModel::query()->findOrFail($user->id);
        }

        return $userEloquent;
    }
}
