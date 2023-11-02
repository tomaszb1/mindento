<?php

namespace Src\BusinessTrip\Delegation\Application\DTO;

use Src\BusinessTrip\Delegation\Domain\Model\CountryCode;
use Src\BusinessTrip\Delegation\Infrastructure\Models\DelegationEloquentModel;

class DelegationWithAmount
{
    public function __construct(
        public readonly string $start,
        public readonly string $end,
        public readonly string $country_code,
        public readonly int $amount_due,
        public readonly string $currency,
    )
    {}

    public static function fromEloquent(DelegationEloquentModel $delegationEloquentModel): self
    {
        return new self(
            start: $delegationEloquentModel->start,
            end: $delegationEloquentModel->end,
            country_code: $delegationEloquentModel->country_code,
            amount_due: $delegationEloquentModel->amount_due,
            currency: $delegationEloquentModel->countryCode->currency,
        );
    }
}
