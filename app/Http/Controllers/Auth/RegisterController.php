<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\auth;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');  // Tignan natin kung mayroon nang view na ito, o mag-generate tayo ng form.
    }

    public function register(Request $request)
    {
        // Validation ng data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Fire event para sa verification
        event(new Registered($user));

        // Auto login pagkatapos mag-register
    auth::login($user);

        // Redirect sa dashboard or verification
        return redirect('/email/verify');
    }
}
