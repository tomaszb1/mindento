<?php

declare(strict_types=1);

namespace Src\BusinessTrip\User\Domain\Model;

use Src\Common\Domain\AggregateRoot;

class User extends AggregateRoot
{
    public function __construct(
        public readonly ?int $id,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }
}
