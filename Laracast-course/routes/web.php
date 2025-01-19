<?php

use App\Http\Controllers\JobController;
use App\Models\Job;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {

//     return view('home');
// });
Route::view("/", "home");


//? in route model binding "id" is default , if you config write like this posts/{post:slug} will search according to slug column

// Route::controller(JobController::class)->group(
//     function () {
//         Route::get('/jobs', "index");
//         Route::get('/jobs/create', "create");
//         Route::get("/jobs/{job}/edit", "edit");
//         Route::post('/jobs', "store");
//         Route::get('/jobs/{job}', "show");
//         Route::patch('/jobs/{job}', "update");
//         Route::delete('/jobs/{job}', "destroy");
//     }
// );
Route::resource("jobs", JobController::class, [
    // "except" => ["edit" , "create"] //? no want edit route and create route
    // "only" => ["store" , "index"] //? only want store and index routes
]);
//* Route:resource follow rest conventiential and automatically know the accordion to controller methods


// Route::get('/contact', function () {
//     return view('contact');
// });
Route::view("/contact", "contact"); //? ::view is use for static page like this
