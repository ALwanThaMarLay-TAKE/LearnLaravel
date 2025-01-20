<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class LoginUserController extends Controller
{
    public function store()
    {
        $attribute = request()->validate([

            "email" => ["required",],
            "password" => ["required", Password::default()],

        ]);

        if (Auth::attempt($attribute)) {

            request()->session()->regenerate();
        } else {
            throw ValidationException::withMessages([
                "password" => "crediential are not correct",
            ]);
        }

        request()->session()->regenerate();
        return redirect('/jobs');
    }
    public function create()
    {
        return view("login");
    }
    public function destroy()
    {
        Auth::logout();
        return redirect('/jobs');
    }
}
