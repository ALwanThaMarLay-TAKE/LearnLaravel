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
Route::get("/jobs/{id}/edit", function ($id) {
    //     validate
    //  authorize
    //  update
    //  redirect
    $job = Job::findOrFail($id);


    return view("jobs.edit", ["job" => $job]);
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

Route::get('/jobs/{id}', function ($data) {


    $job =   Job::findOrFail($data);
    return view('jobs.show', compact("job"));
});
Route::patch('/jobs/{id}', function ($id) {

    request()->validate([
        "name" => ['required', "min:3"],
        "salary" => ["required"]
    ]);
    $job =   Job::findOrFail($id);
    // $job->name = request("name");
    // $job->salary = request("salary");
    // $job->save();

    $job->update([
        "name" => request("name"),
        "salary" => request("salary")
    ]);

    return redirect("/jobs/" . $job->id);
});
Route::delete('/jobs/{id}', function ($id) {


    $job =   Job::findOrFail($id);
    $job->delete();

    // Job::findOrFail($id)->delete();


    return redirect("/jobs");
});

Route::get('/contact', function () {
    return view('contact');
});
