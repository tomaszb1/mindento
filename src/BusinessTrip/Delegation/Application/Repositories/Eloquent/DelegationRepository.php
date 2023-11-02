<?php
declare(strict_types=1);

namespace Src\BusinessTrip\Delegation\Application\Repositories\Eloquent;

use Src\BusinessTrip\Delegation\Application\DTO\DelegationWithAmount;
use Src\BusinessTrip\Delegation\Application\Mappers\DelegationMapper;
use Src\BusinessTrip\Delegation\Domain\Model\Delegation;
use Src\BusinessTrip\Delegation\Infrastructure\Models\DelegationEloquentModel;
use Src\BusinessTrip\Delegation\Domain\Repositories\DelegationRepositoryInterface;

class DelegationRepository implements DelegationRepositoryInterface
{
    public function findAllByUserId(int $userId): array
    {
        $delegations = [];
        $delegationsEloquent = DelegationEloquentModel::query()->where(
            'user_id',
            '=',
            $userId
        )->get();

        foreach ($delegationsEloquent as $delegationEloquent) {
            $delegations[] = DelegationWithAmount::fromEloquent($delegationEloquent);
        }

        return $delegations;
    }

    public function store(Delegation $delegation): Delegation
    {
        $delegationEloquent = DelegationMapper::toEloquent($delegation);
        $delegationEloquent->save();
        return DelegationMapper::fromEloquent($delegationEloquent);
    }
}
