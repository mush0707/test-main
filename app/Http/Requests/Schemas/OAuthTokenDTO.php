<?php

namespace App\Http\Requests\Schemas;
use OpenApi\Attributes as OA;
#[OA\Schema()]
class OAuthTokenDTO
{
    public function __construct(
        #[OA\Property()]
        private string $grant_type = 'client_credentials',
        #[OA\Property()]
        private int $client_id = 1,
        #[OA\Property()]
        private string $scope = '*',
        #[OA\Property()]
        private string $client_secret = ''
    )
    {
    }

    public function getGrantType(): string
    {
        return $this->grant_type;
    }

    public function getClientId(): int
    {
        return $this->client_id;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function getClientSecret(): string
    {
        return $this->client_secret;
    }


}
