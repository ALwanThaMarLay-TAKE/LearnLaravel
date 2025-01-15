<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job extends Model
{
    use HasFactory;
    protected $table = "job_list";
    protected $fillable = ["name", "salary"];
    //App\Models\Job::create(['name'=>"designer" , 'salary' => "20000"])
}
