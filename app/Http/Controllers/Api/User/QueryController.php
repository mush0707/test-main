<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class QueryController extends ApiController
{
    public function __construct(
        private readonly UserRepository $repository
    )
    {
    }

    #[OA\Get(
        path: '/api/user/{userId}/check',
        operationId: "userCheck",
        summary: "check if user exists",
        tags: ["Users"],
    )]
    #[OA\Parameter(
        name: "userId",
        in: "path",
        required: true,
        schema: new OA\Schema(
            type: "integer"
        )
    )]
    #[OA\Response(
        response: 200,
        description: 'OK',
        content: new OA\JsonContent(
            ref: "#/components/schemas/BooleanSchema"
        )
    )]
    public function check(int $id): JsonResponse
    {
        return $this->success($this->repository->check($id));
    }
}
