<?php
declare(strict_types=1);

namespace Src\BusinessTrip\Delegation\Application\Providers;

use Illuminate\Support\ServiceProvider;
use Src\BusinessTrip\Delegation\Application\Repositories\Eloquent\DelegationRepository;
use Src\BusinessTrip\Delegation\Domain\Repositories\DelegationRepositoryInterface;

class DelegationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            DelegationRepositoryInterface::class,
            DelegationRepository::class
        );
    }
}
