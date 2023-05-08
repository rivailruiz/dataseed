<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordRecoveryController extends Controller
{
    public function sendRecoveryEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if ($response == Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'Password reset link sent to your email']);
        }

        return response()->json(['message' => 'Unable to send password reset link'], 500);
    }

    protected function broker()
    {
        return Password::broker();
    }
}
