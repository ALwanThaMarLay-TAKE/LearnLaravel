<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{

    public static function all(): array
    {
        return  [
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
    }
    public static function find($id)
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] = $id);
        if (!$job) {
            abort(404);
        }
        return $job;
    }
}
