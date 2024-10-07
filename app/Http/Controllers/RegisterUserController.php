<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('/register');
    }
    public function store()
    {
        // Validate the user
        $validated = request()->validate([
            'username'=> ['required','unique:users,username'],
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> ['required','email','unique:users,email'],
            'password'=> ['required',Password::min(6),'confirmed'],
        ]);
        $user = User::create($validated);
        Auth::login($user);
        return redirect('/dashboard/projects');
    }
}
