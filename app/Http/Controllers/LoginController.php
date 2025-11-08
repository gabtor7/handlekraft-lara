<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            return redirect()->intended('/');
        }

        $user = \App\Models\User::where('email', $request->email)->first();
        dd(Hash::check($request->password, $user->password));
 
        return back()->withErrors([
            'email' => 'Email/mot de passe erroné(s)',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return response()->json(['message' => 'Logged out']);
    }

    /**
     * Registers a new User with the given data
     */
    public function registerUser(Request $request){

        // need to check whether the mail address already exists
        // $exists = User::select('*')
        // ->where("email", $request->email)->exists();

        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);
        echo($request);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => $request->rememberStatus
        ]);

        $user->save();

        event(new Registered($user));

        $device = substr($request->userAgent() ?? '', 0, 255);

        return response()->json([
            // find out about this, createToken doesn't exist in this project...
            'access_token' => $user->createToken($device)->plainTextToken,
        ], Response::HTTP_CREATED);

    }

}
