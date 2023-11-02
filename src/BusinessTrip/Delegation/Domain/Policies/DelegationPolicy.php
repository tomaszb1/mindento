<?php
declare(strict_types=1);

namespace Src\BusinessTrip\Delegation\Domain\Policies;

class DelegationPolicy
{
    public static function findAllByUserId(): bool
    {
        return true;
    }

    public static function store(): bool
    {
        return true;
    }
}
