<?php

namespace App\Http\Controllers\Api\User\Rewards;

use App\Http\Controllers\ApiController;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use OpenApi\Attributes as OA;

class CommandController extends ApiController
{
    public function __construct(
        private readonly UserRepository $repository
    )
    {
    }

    #[OA\Patch(
        path: '/api/user/rewards/{userId}/{rewardId}',
        operationId: "attachReward",
        summary: "attach reward",
        tags: ["Rewards"],
    )]
    #[OA\Parameter(
        name: "userId",
        in: "path",
        required: true,
        schema: new OA\Schema(
            type: "integer"
        )
    )]
    #[OA\Parameter(
        name: "rewardId",
        in: "path",
        required: true,
        schema: new OA\Schema(
            type: "integer"
        )
    )]
    #[OA\Response(
        response: 404,
        description: 'user not found'
    )]
    #[OA\Response(
        response: 409,
        description: 'reward already attached to this user'
    )]
    #[OA\Response(
        response: 200,
        description: 'OK'
    )]
    public function attachReward(int $userId, int $rewardId): JsonResponse
    {
        try {
            $this->repository->attach($userId, $rewardId);
        } catch (\InvalidArgumentException $exception) {
            return $this->errors([], $exception->getMessage(), $exception->getCode());
        }
        return $this->success();
    }

    #[OA\Delete(
        path: '/api/user/rewards/{rewardId}',
        operationId: "detachReward",
        summary: "detach reward",
        tags: ["Rewards"],
    )]
    #[OA\Parameter(
        name: "rewardId",
        in: "path",
        required: true,
        schema: new OA\Schema(
            type: "integer"
        )
    )]
    #[OA\Response(
        response: 204,
        description: 'OK'
    )]
    public function detachReward(int $rewardId): Response
    {
        $this->repository->detachReward($rewardId);
        return $this->destroyResponse();
    }
}
