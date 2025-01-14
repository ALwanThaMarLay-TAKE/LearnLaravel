<?php

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    return view('jobs', ["jobs" => Job::all()]);
});

Route::get('/job/{id}', function ($data) {


  $job =   job::find($data);
    return view('job', compact("job"));
});

Route::get('/contact', function () {
    return view('contact');
});
