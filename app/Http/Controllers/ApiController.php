<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiClientResponse;
use OpenApi\Attributes as OA;

/**
 * @OA\Info(
 *    title="Main API",
 *    version="1.0.0"
 * ),
 * @OA\Server(
 *    url="http://127.0.0.1:8000",
 *    description="local"
 * )
 */

#[OA\Post(
    path: '/oauth/token',
    operationId: "oauthToken",
    summary: "get client token",
    tags: ["Auth"],
)]
#[OA\RequestBody(
    required: true,
    content: new OA\JsonContent(
        ref: "#/components/schemas/OAuthTokenDTO"
    )
)]
#[OA\Response(
    response: 401,
    description: 'client id or secret wrong',
    content: new OA\JsonContent(
        ref: "#/components/schemas/OAuthTokenErrorSchema"
    )
)]
#[OA\Response(
    response: 200,
    description: 'OK',
    content: new OA\JsonContent(
        ref: "#/components/schemas/OAuthTokenSchema"
    )
)]
class ApiController extends Controller
{
    use ApiClientResponse;
}
