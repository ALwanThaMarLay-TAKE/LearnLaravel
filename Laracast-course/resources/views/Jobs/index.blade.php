<x-layout>
    <x-slot:heading>
        Job List
    </x-slot:heading>
    <div class="space-y-4">

        @foreach ($jobs as $job)
            <div class="w-full rounded-lg border bg-orange-500 p-5">
                <a href="/jobs/{{ $job['id'] }}">
                    <div class="text-white">{{ $job->employer->name }}</div>
                    <div class="mt-2">
                        <strong> {{ $job['name'] }}</strong> pays {{ $job['salary'] }} per year.
                    </div>
                </a>
            </div>
        @endforeach
        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
