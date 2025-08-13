<?php

namespace App\Data\API\V1\Auth;

use Spatie\LaravelData\Data;

class RegistrationOTPDtoData extends Data
{
    public function __construct(
        public string $firstname,
        public string $lastname,
        public string $username,
        public string $phone,
        public string $email,
        public string $otp,
    ) {}
}
