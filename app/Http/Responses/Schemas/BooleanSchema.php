<?php

namespace App\Http\Responses\Schemas;
use OpenApi\Attributes as OA;
#[OA\Schema()]
class BooleanSchema
{
    #[OA\Property()]
    private bool $data;
}
