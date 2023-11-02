<?php
declare(strict_types=1);

namespace Src\Common\Domain;

use Src\Common\Domain\Exceptions\UnauthorizedUserException;

interface QueryInterface
{
    /**
     * @throws UnauthorizedUserException
     */
    public function handle(): mixed;
}
