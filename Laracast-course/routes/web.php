<?php

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('home');
});

Route::get('/jobs', function () {
    // $jobs = Job::all();  //*this is lazy loading and happen multiple sql query
    $jobs = Job::with("employer")->paginate(2); //* this is eager loading and query multiple item in one time
    return view('jobs', ["jobs" => $jobs]);
});

Route::get('/job/{id}', function ($data) {


    $job =   job::find($data);
    return view('job', compact("job"));
});

Route::get('/contact', function () {
    return view('contact');
});
