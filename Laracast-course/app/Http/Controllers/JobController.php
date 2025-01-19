<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

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
        //     validate
        //  authorize
        //  update
        //  redirect
        //* $job = Job::findOrFail($job); no need when route model binding


        return view("jobs.edit", ["job" => $job]);
    }
    public function show(Job $job)
    {
        // $job =   Job::findOrFail($data);
        return view('jobs.show', compact("job"));
    }
    public function update(Job $job)
    {
        request()->validate([
            "name" => ['required', "min:3"],
            "salary" => ["required"]
        ]);
        // $job =   Job::findOrFail($job);
        // $job->name = request("name");
        // $job->salary = request("salary");
        // $job->save();

        $job->update([
            "name" => request("name"),
            "salary" => request("salary")
        ]);

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
