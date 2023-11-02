<?php

declare(strict_types=1);

namespace Src\BusinessTrip\Delegation\Domain\Model;

use Src\BusinessTrip\Delegation\Domain\Model\ValueObjects\Name;
use Src\Common\Domain\AggregateRoot;

class Delegation extends AggregateRoot
{
    public function __construct(
        public readonly ?int $id,
        public readonly int $user_id,
        public readonly string $start,
        public readonly string $end,
        public readonly Name $country_code,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'start' => $this->start,
            'end' => $this->end,
            'country' => $this->country_code,
        ];
    }
}
