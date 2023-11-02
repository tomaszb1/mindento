<?php
declare(strict_types=1);

namespace Src\BusinessTrip\Delegation\Application\UseCases\Commands;

use Illuminate\Support\Facades\App;
use Src\Common\Domain\CommandInterface;
use Src\BusinessTrip\Delegation\Domain\Model\Delegation;
use Src\BusinessTrip\Delegation\Domain\Policies\DelegationPolicy;
use Src\BusinessTrip\Delegation\Domain\Repositories\DelegationRepositoryInterface;

class StoreDelegationCommand implements CommandInterface
{
    private DelegationRepositoryInterface $repository;

    public function __construct(
        private readonly Delegation $delegation
    )
    {
        $this->repository = App::make(DelegationRepositoryInterface::class);
    }

    public function execute(): Delegation
    {
        authorize('store', DelegationPolicy::class);

        return $this->repository->store($this->delegation);
    }
}
