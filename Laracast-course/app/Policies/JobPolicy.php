<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;


class JobPolicy
{
    public function edit(User $user, Job $job): bool //define policy name edit like gate but only specific for job
    {
        return ($job->employer->user->is($user));
    }
}
