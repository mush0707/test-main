<?php

namespace App\Http\Responses\Schemas;
use OpenApi\Attributes as OA;

#[OA\Schema()]
class OAuthTokenErrorSchema
{
    public function __construct(
        #[OA\Property()]
        private string $error = 'invalid_client',
        #[OA\Property()]
        private string $error_description = 'Client authentication failed',
        #[OA\Property()]
        private string $message = 'Client authentication failed'
    )
    {
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function getErrorDescription(): string
    {
        return $this->error_description;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

}
