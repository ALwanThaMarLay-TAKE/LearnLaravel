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
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,   foreignPivotKey: "job_list_id");
    }
    //* foreignPivotKey is for the current model class , ( Job model ) assume as job_list_id instead of job_id

}
