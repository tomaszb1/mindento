<?php
declare(strict_types=1);

namespace Src\Common\Domain;
use JsonSerializable;

abstract class AggregateRoot implements JsonSerializable
{
    abstract public function toArray(): array;

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
