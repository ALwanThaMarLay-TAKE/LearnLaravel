<?php

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('home');
});

Route::get('/jobs', function () {
    $jobs =     Job::all();

    return view('jobs', ["jobs" => $jobs]);
});

Route::get('/job/{id}', function ($data) {


    $job =   job::find($data);
    return view('job', compact("job"));
});

Route::get('/contact', function () {
    return view('contact');
});
