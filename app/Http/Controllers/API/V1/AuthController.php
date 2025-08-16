<?php

namespace App\Http\Controllers\API\V1;

use App\Data\API\V1\APIResponseData;
use App\Data\API\V1\Auth\ForgotPasswordDtoData;
use App\Data\API\V1\Auth\RegistrationOTPDtoData;
use App\Data\API\V1\Auth\ResetPasswordDtoData;
use App\Http\Controllers\Controller;
use App\Mail\EmailRegisterVerification;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function sendVerifyEmail(RegistrationOTPDtoData $request)
    {
        $receiverName = '';
        Mail::to($request->email)->send(new EmailRegisterVerification($receiverName, $request->otp));
        Log::info('REGISTER_VERIFY: Sent Email To ' . $request->email);
        return;
    }

    public function sendForgotPassword(ForgotPasswordDtoData $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            Log::error('FORGOT_PW: User Not Found.');
            return response()->json(APIResponseData::from([
                'success' => false,
                'message' => 'User Not Found.'
            ]), 400);
        }
        $status = Password::broker()->sendResetLink(['email' => $request->email]);
        Log::info('FORGOT_PW: Sent Email To ' . $request->email);
        return response()->json(APIResponseData::from([
            'success' => true,
            'message' => 'Reset Password Email is sent'
        ]), 200);
    }

    public function resetPassword(ResetPasswordDtoData $request)
    {
        $status = Password::reset(
            $request->toArray(),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );
        if ($status === Password::PasswordReset) {
            return response()->json(APIResponseData::from([
                'success' => true,
                'message' => 'Reset Password Email is sent'
            ]), 200);
        }
        return response()->json(APIResponseData::from([
            'success' => false,
            'message' => 'Something Went Wrong.'
        ]), 400);
    }
}
