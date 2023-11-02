<?php
declare(strict_types=1);

namespace Src\Common\Domain;

use Src\Common\Domain\Exceptions\UnauthorizedUserException;

interface CommandInterface
{
    /**
     * @throws UnauthorizedUserException
     */
    public function execute();
}
