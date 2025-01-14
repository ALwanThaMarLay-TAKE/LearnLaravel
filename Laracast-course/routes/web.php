<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = [
        [
            "id" => 1,
            "job" => "Web Developer",
            "salary" => 10000

        ],
        [
            "id" => 2,
            "job" => "Mobile Developer",
            "salary" => 20000

        ],
        [
            "id" => 3,
            "job" => "Desktop Developer",
            "salary" => 30000

        ],
    ];
    return view('jobs', ["jobs" => $jobs]);
});

Route::get('/job/{id}', function ($data) {

    $jobs = [
        [
            "id" => 1,
            "job" => "Web Developer",
            "salary" => 10000

        ],
        [
            "id" => 2,
            "job" => "Mobile Developer",
            "salary" => 20000

        ],
        [
            "id" => 3,
            "job" => "Desktop Developer",
            "salary" => 30000

        ],
    ];
    $job = Arr::first($jobs, fn($job) => $data = $job["id"]);
    return view('job', compact("job"));
});

Route::get('/contact', function () {
    return view('contact');
});
