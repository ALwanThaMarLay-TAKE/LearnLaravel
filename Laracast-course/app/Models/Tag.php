<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;
    public function jobs()
    {
        return $this->belongsToMany(Job::class, relatedPivotKey: "job_list_id");
    }
}

//* relatePiovtKey is for the class that belong function argument (Job::class) assume job_list_id instead of job_id

//* $tag->jobs()->attach(job_list_id)
    //* $tag->jobs()->attach(App\Models\Job::find(id)
