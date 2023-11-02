<?php
declare(strict_types=1);

namespace Src\BusinessTrip\User\Application\Providers;

use Illuminate\Support\ServiceProvider;
use Src\BusinessTrip\User\Application\Repositories\UserRepository;
use Src\BusinessTrip\User\Domain\Repositories\UserRepositoryInterface;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }
}
