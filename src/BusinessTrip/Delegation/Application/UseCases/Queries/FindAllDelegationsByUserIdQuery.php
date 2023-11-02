<?php
declare(strict_types=1);

namespace Src\BusinessTrip\Delegation\Application\UseCases\Queries;

use Illuminate\Support\Facades\App;
use Src\Common\Domain\QueryInterface;
use Src\BusinessTrip\Delegation\Domain\Policies\DelegationPolicy;
use Src\BusinessTrip\Delegation\Domain\Repositories\DelegationRepositoryInterface;

class FindAllDelegationsByUserIdQuery implements QueryInterface
{
    private DelegationRepositoryInterface $repository;

    public function __construct(private readonly int $userId)
    {
        $this->repository = App::make(DelegationRepositoryInterface::class);
    }

    public function handle(): array
    {
        authorize('findAllByUserId', DelegationPolicy::class);
        return $this->repository->findAllByUserId($this->userId);
    }
}
