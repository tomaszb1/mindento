<?php
declare(strict_types=1);

namespace Src\BusinessTrip\Delegation\Domain\Repositories;

use Src\BusinessTrip\Delegation\Domain\Model\Delegation;

interface DelegationRepositoryInterface
{
    public function findAllByUserId(int $userId): array;

    public function store(Delegation $delegation): Delegation;
}
