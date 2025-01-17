<x-layout>
    <x-slot:heading>
        Job List
    </x-slot:heading>
    <div class="space-y-4">

        @foreach ($jobs as $job)
            <div class="w-full p-5 bg-orange-500 border rounded-lg">
                <a href="/job/{{ $job['id'] }}">
                    <div class="text-white">{{ $job->employer->name }}</div>
                    <div class="mt-2">
                        <strong> {{ $job['name'] }}</strong> pays {{ $job['salary'] }} per year.
                    </div>
                </a>
            </div>
        @endforeach
    </div>

</x-layout>
