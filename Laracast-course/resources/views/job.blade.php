<x-layout>
    <x-slot:heading>
        {{ $job['job'] }}
    </x-slot:heading>
    <h1 class="font-serif font-bold text-gray-700">This job pay {{ $job['salary'] }} per year</h1>
    <a class="text-blue-500 underline " href="/jobs">Back to Jobs</a>
</x-layout>
