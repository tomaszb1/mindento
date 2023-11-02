<?php

declare(strict_types=1);

namespace Src\BusinessTrip\Delegation\Domain\Model\ValueObjects;

use Src\Common\Domain\Exceptions\RequiredException;
use Src\Common\Domain\ValueObject;

final class Amount extends ValueObject
{
    private int $amount;

    public function __construct(?int $amount)
    {
        if (null === $amount) {
            throw new RequiredException('amount');
        }

        $this->amount = $amount;
    }

    public function __toString(): int
    {
        return $this->amount;
    }

    public function jsonSerialize(): int
    {
        return $this->amount;
    }
}
