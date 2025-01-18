<x-layout>
    <x-slot:heading>
        {{ $job->name }}
    </x-slot:heading>
    <h1 class="font-serif font-bold text-gray-700">This job pay {{ $job['salary'] }} per year</h1>
    <div class="mt-10 flex justify-between">
        <div>
            <a class="rounded bg-gray-300 p-1 text-blue-500 underline" href="/jobs">Back to Jobs</a>
            <x-button class="inline text-blue-500" href="/jobs/{{ $job->id }}/edit">Edit</x-button>
        </div>

        <form action="/jobs/{{ $job->id }}" method='POST'>
            @csrf
            @method('DELETE')
            <button class="inline rounded border text-red-500">Delete</button>
        </form>
    </div>

</x-layout>
