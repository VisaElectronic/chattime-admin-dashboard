<?php

namespace App\Http\Controllers\API\V1;

use App\Data\API\V1\Auth\RegistrationOTPDtoData;
use App\Http\Controllers\Controller;
use App\Mail\EmailRegisterVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function sendVerifyEmail(RegistrationOTPDtoData $request)
    {
        $receiverName = $request->firstname .' '. $request->lastname;
        Mail::to($request->email)->send(new EmailRegisterVerification($receiverName, $request->otp));
        return;
    }
}
