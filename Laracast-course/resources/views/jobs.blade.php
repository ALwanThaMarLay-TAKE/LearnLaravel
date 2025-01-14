<x-layout>
    <x-slot:heading>
        Job List
    </x-slot:heading>
    <ul>
        @foreach ($jobs as $job)
            <li><a href="/job/{{ $job['id'] }}">{{ $job['job'] }}</a></li>
        @endforeach
    </ul>
</x-layout>
