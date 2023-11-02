<?php
declare(strict_types=1);

namespace Src\BusinessTrip\User\Application\UseCases\Queries;

use Illuminate\Support\Facades\App;
use Src\BusinessTrip\User\Domain\Model\User;
use Src\BusinessTrip\User\Domain\Repositories\UserRepositoryInterface;
use Src\Common\Domain\QueryInterface;

class FindUserByIdQuery implements QueryInterface
{
    private UserRepositoryInterface $repository;

    public function __construct(
        private readonly int $id
    )
    {
        $this->repository = App::make(UserRepositoryInterface::class);
    }

    public function handle(): User
    {
        return $this->repository->findById($this->id);
    }
}
