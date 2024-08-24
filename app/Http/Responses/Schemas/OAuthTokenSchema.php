<?php

namespace App\Http\Responses\Schemas;
use OpenApi\Attributes as OA;

#[OA\Schema()]
class OAuthTokenSchema
{
    public function __construct(
        #[OA\Property()]
        private string $token_type = 'Bearer',
        #[OA\Property()]
        private int $token_expired = 31536000,
        #[OA\Property()]
        private string $access_token = '',
    )
    {
    }

    public function getTokenType(): string
    {
        return $this->token_type;
    }

    public function getTokenExpired(): int
    {
        return $this->token_expired;
    }

    public function getAccessToken(): string
    {
        return $this->access_token;
    }

}
