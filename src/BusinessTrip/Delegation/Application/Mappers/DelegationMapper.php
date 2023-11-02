<?php

namespace Src\BusinessTrip\Delegation\Application\Mappers;

use Illuminate\Http\Request;
use Src\BusinessTrip\Delegation\Domain\Model\Delegation;
use Src\BusinessTrip\Delegation\Domain\Model\ValueObjects\Name;
use Src\BusinessTrip\Delegation\Infrastructure\Models\DelegationEloquentModel;

class DelegationMapper
{
    public static function fromRequest(
        Request $request,
        ?int $delegation_id = null
    ): Delegation
    {
        return new Delegation(
            id: $delegation_id,
            user_id: $request->integer('user_id'),
            start: $request->string('start'),
            end: $request->string('end'),
            country_code: new Name($request->string('country_code')),
        );
    }

    public static function fromEloquent(
        DelegationEloquentModel $delegationEloquentModel,
    ): Delegation {
        return new Delegation(
            id: $delegationEloquentModel->id,
            user_id: $delegationEloquentModel->id,
            start: $delegationEloquentModel->start,
            end: $delegationEloquentModel->end,
            country_code: new Name($delegationEloquentModel->country_code),
        );
    }

    public static function toEloquent(Delegation $delegation): DelegationEloquentModel
    {
        $delegationEloquent = new DelegationEloquentModel();
        if ($delegation->id) {
            $delegationEloquent = DelegationEloquentModel::query()->findOrFail($delegation->id);
        }
        $delegationEloquent->start = $delegation->start;
        $delegationEloquent->end = $delegation->end;
        $delegationEloquent->user_id = $delegation->user_id;
        $delegationEloquent->country_code = $delegation->country_code;

        return $delegationEloquent;
    }
}
