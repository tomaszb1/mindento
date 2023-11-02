<?php
declare(strict_types=1);

namespace Src\BusinessTrip\User\Presentation\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BusinessTrip\User\Application\Mappers\UserMapper;
use Src\BusinessTrip\User\Application\UseCases\Commands\StoreUserCommand;
use Src\Common\Infrastructure\Laravel\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $command = (new StoreUserCommand(
            UserMapper::fromRequest()
        ));

        return new JsonResponse(
            $command->execute()
                ->toArray(),
            Response::HTTP_CREATED
        );
    }
}
