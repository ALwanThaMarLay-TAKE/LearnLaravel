<?php

use App\Models\Job;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('home');
});

Route::get('/jobs', function () {
    // $jobs = Job::all();  //*this is lazy loading and happen multiple sql query
    $jobs = Job::with("employer")->paginate(5); //* this is eager loading and query multiple item in one time
    return view('jobs.index', ["jobs" => $jobs]);
});

Route::get('/jobs/create', function () {



    return view('jobs.create');
});
Route::post('/jobs', function () {
    request()->validate([
        "name" => ["required", "min:4"],
        "salary" => ["required"]
    ]);
    Job::create([
        "name" => request("name"),
        "salary" => request("salary"),
        "employer_id" => 1
    ]);
    return redirect("/jobs");
});

Route::get('/job/{id}', function ($data) {


    $job =   job::find($data);
    return view('jobs.show', compact("job"));
});

Route::get('/contact', function () {
    return view('contact');
});
