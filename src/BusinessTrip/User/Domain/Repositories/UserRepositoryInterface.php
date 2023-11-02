<?php
declare(strict_types=1);

namespace Src\BusinessTrip\User\Domain\Repositories;

use Src\BusinessTrip\User\Domain\Model\User;

interface UserRepositoryInterface
{
    public function store(User $user): User;
}
