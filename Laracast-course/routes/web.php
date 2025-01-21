<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use App\Models\Job;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {

//     return view('home');
// });
Route::view("/", "home");


//? in route model binding "id" is default , if you config write like this posts/{post:slug} will search according to slug column

Route::controller(JobController::class)->group(
    function () {
        Route::get('/jobs', "index")->middleware("auth"); //fail auto redirect to laravel default login page , we need to name our login page using name function
        Route::get('/jobs/create', "create")->middleware("auth");
        Route::get("/jobs/{job}/edit", "edit")->middleware(['auth', 'can:edit,job']);
        Route::post('/jobs', "store")->middleware("auth");
        Route::get('/jobs/{job}', "show")->middleware("auth");;
        Route::patch('/jobs/{job}', "update")->middleware("auth")->can("edit", "job"); //same as midddleware("can:job-edit,job")
        Route::delete('/jobs/{job}', "destroy")->middleware("auth")->can("edit", "job");
    }
);

// Route::resource(
//     "jobs",
//     JobController::class,
// [
// "except" => ["edit" , "create"] //? no want edit route and create route
// "only" => ["store" , "index"] //? only want store and index routes
// ]
// )only(["edit"])->middleware("auth");
//* Route:resource follow rest conventiential and automatically know the accordion to controller methods


// Route::get('/contact', function () {
//     return view('contact');
// });
Route::view("/contact", "contact"); //? ::view is use for static page like this
Route::post("/login", [LoginUserController::class, "store"]);
Route::get("/login", [LoginUserController::class, "create"])->name("login");
Route::post("/logout", [LoginUserController::class, "destroy"]);
Route::post("/register", [RegisterUserController::class, "store"]);
Route::get("/register", [RegisterUserController::class, "create"]);
