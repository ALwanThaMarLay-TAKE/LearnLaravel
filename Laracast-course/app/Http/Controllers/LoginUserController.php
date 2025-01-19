<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginUserController extends Controller
{
    public function store() {
        dd(request()->all());
    }
    public function create()
    {
        return view("login");
    }
}
