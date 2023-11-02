<?php
declare(strict_types=1);

namespace Src\BusinessTrip\Delegation\Presentation\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BusinessTrip\Delegation\Application\Mappers\DelegationMapper;
use Src\BusinessTrip\Delegation\Application\UseCases\Commands\StoreDelegationCommand;
use Src\BusinessTrip\Delegation\Application\UseCases\Queries\FindAllDelegationsByUserIdQuery;
use Src\BusinessTrip\Delegation\Presentation\API\Requests\DelegationRequest;
use Symfony\Component\HttpFoundation\Response;

class DelegationController
{
    public function index(Request $request): JsonResponse
    {
        return new JsonResponse(
            (new FindAllDelegationsByUserIdQuery((int) $request->user_id))
                ->handle()
        );
    }

    public function store(DelegationRequest $request): JsonResponse
    {
        $command = (new StoreDelegationCommand(
            DelegationMapper::fromRequest($request)
        ));

        return new JsonResponse(
            $command->execute(),
            Response::HTTP_CREATED
        );
    }
}
