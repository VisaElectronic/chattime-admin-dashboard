<?php

namespace App\Data\API\V1;

use Spatie\LaravelData\Data;

class APIResponseData extends Data
{
    public function __construct(
        public bool $success,
        public ?object $data,
        public ?string $message,
    ) {}
}
