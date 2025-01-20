<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view("register");
    }
    public function store()
    {
        $attribute = request()->validate([
            "name" => ["required"],
            "email" => ["required",],
            "password" => ["required", Password::default() , "confirmed"],

        ]);

        if ($user =  User::create($attribute)) {
            Auth::login($user);
        } else {
            throw ValidationException::withMessages([
                "name" => "crediential are not support",
            ]);
        }

        return redirect('/jobs');
    }
}
