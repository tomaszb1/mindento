<?php

declare(strict_types=1);

namespace Src\BusinessTrip\Delegation\Domain\Model;

use Src\BusinessTrip\Delegation\Domain\Model\ValueObjects\Amount;
use Src\BusinessTrip\Delegation\Domain\Model\ValueObjects\Currency;
use Src\BusinessTrip\Delegation\Domain\Model\ValueObjects\Name;
use Src\Common\Domain\Entity;

class CountryCode extends Entity
{
    public function __construct(
        public readonly Name $name,
        public readonly Amount $type,
        public readonly Currency $currency,
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'amount' => $this->type,
            'currency' => $this->currency,
        ];
    }
}
