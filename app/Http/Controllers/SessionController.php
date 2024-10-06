<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("login");
    }
    public function store()
    {
        $validated = request()->validate([
            "email" => "required",
            "password" => ['required', Password::min(5)],
        ]);
        $login = Auth::attempt($validated);
        if ($login) {
            request()->session()->regenerate();
            return redirect('/');
        }else {
            throw ValidationException::withMessages([
                'email' => 'credentials do not match',
            ]);
        }
    }
    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
