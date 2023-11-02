<?php
declare(strict_types=1);

namespace Src\BusinessTrip\User\Application\Repositories;

use Src\BusinessTrip\User\Application\Mappers\UserMapper;
use Src\BusinessTrip\User\Domain\Model\User;
use Src\BusinessTrip\User\Domain\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function store(User $user): User
    {
        $userEloquent = UserMapper::toEloquent($user);
        $userEloquent->save();

        return UserMapper::fromEloquent($userEloquent);
    }
}
