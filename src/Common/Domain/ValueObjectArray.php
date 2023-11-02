<?php

namespace Src\Common\Domain;
use JsonSerializable;
use ArrayIterator;

abstract class ValueObjectArray extends ArrayIterator implements JsonSerializable
{
    abstract public function jsonSerialize(): array;
}
