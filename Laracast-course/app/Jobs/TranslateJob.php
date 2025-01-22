<?php

namespace App\Jobs;

use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class TranslateJob implements ShouldQueue
{
    //php artisan make:job and logic in handle method
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Job $jobListing)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //the queue logic you want
        // logger("translating  " . $this->jobListing->name  . " to myanamr");

        Mail::to("hehe@gmail.com")->send(new JobPosted($this->jobListing));
    }
}
