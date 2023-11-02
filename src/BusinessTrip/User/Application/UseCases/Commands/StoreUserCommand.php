<?php
declare(strict_types=1);

namespace Src\BusinessTrip\User\Application\UseCases\Commands;

use Illuminate\Support\Facades\App;
use Src\BusinessTrip\User\Domain\Model\User;
use Src\BusinessTrip\User\Domain\Repositories\UserRepositoryInterface;
use Src\Common\Domain\CommandInterface;

class StoreUserCommand implements CommandInterface
{
    private UserRepositoryInterface $repository;
    public function __construct(
        private readonly User $user,
    ) {
        $this->repository = App::make(UserRepositoryInterface::class);
    }

    public function execute(): User
    {
        return $this->repository->store($this->user);
    }
}
