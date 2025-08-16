<?php

namespace App\Data\API\V1\Auth;

use Spatie\LaravelData\Data;

class ForgotPasswordDtoData extends Data
{
    public function __construct(
        public string $email,
    ) {}
}
