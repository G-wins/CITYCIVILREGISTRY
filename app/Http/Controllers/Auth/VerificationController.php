<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    // Show the email verification notice
    public function show()
    {
        return view('auth.verify-email'); 
    }

    // Handle the email verification
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill(); 
        return redirect('/dashboard'); 
    }

    // Resend the verification email
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/dashboard');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
