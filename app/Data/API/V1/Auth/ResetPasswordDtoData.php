<?php

namespace App\Data\API\V1\Auth;

use Illuminate\Validation\Rules\Password;
use Spatie\LaravelData\Data;

class ResetPasswordDtoData extends Data
{
    public function __construct(
        public string $email,
        public string $password,
        public string $password_confirmation,
        public string $token,
    ) {}

    public static function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => [
                'required',
                'min:5',
                'confirmed', // <-- This rule checks for the "password_confirmation" field.
                // Password::min(8)->mixedCase()->numbers()->symbols() // <-- Example of more robust password rules
                Password::min(5) // <-- Example of more robust password rules
            ],
            'password_confirmation' => ['required'], // You can add other rules if needed
            'token' => ['required'],
        ];
    }
}
