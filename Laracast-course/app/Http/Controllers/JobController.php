<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
        // $jobs = Job::all();  //*this is lazy loading and happen multiple sql query
        $jobs = Job::with("employer")->paginate(5); //* this is eager loading and query multiple item in one time
        return view('jobs.index', ["jobs" => $jobs]);
    }
    public function create()
    {
        return view('jobs.create');
    }
    public function store()
    {
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
    }
    public function edit(Job $job) //this is route model binding
    {

        //route level middleware authorization
        return view("jobs.edit", ["job" => $job]);
    }
    public function show(Job $job)
    {
        // $job =   Job::findOrFail($data);
        return view('jobs.show', compact("job"));
    }
    public function update(Job $job)


    {
        //     validate
        request()->validate([
            "name" => ['required', "min:3"],
            "salary" => ["required"]
        ]);
        //  authorize




        //  update

        // $job =   Job::findOrFail($job);
        // $job->name = request("name");
        // $job->salary = request("salary");
        // $job->save();

        $job->update([
            "name" => request("name"),
            "salary" => request("salary")
        ]);

        //  redirect

        return redirect("/jobs/" . $job->id);
    }
    public function destroy(Job $job)
    {
        // $job =   Job::findOrFail($job);
        $job->delete();

        // Job::findOrFail($id)->delete();


        return redirect("/jobs");
    }
}
