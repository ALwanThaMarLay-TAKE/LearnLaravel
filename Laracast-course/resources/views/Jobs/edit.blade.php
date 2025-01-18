<x-layout>
    <x-slot:heading>
        Edit Job
    </x-slot:heading>
    <div class="space-y-4">
        <div class="w-1/2">
            <form class="space-y-6" action="/jobs/{{ $job->id }}" method="POST">
                @csrf
                @method('PATCH')
                <div>
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Job Name</label>
                    <div class="mt-2">
                        <input type="name" name="name" id="name" value="{{ $job->name }}"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                    <div class="mt-1">
                        @error('name')
                            <p class="text-sm italic text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>

                    </div>
                    <div class="mt-2">
                        <input value="{{ $job->salary }}" type="salary" name="salary" id="salary"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                    <div class="mt-1">

                        @error('salary')
                            <p class="text-sm italic text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-3">
                    <a href="/jobs/{{ $job->id }}"
                        class="bg-white-600 flex w-full justify-center rounded-md border px-3 py-1.5 text-sm/6 font-semibold text-gray-700 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                    <button form="delete-form" type="submit"
                        class="flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>

                </div>
            </form>
        </div>
        <form id="delete-form" action="/jobs/{{ $job->id }}" method='POST' class="hidden">
            @csrf
            @method('DELETE')
        </form>
        {{-- <div>
            @if ($errors->any())

                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-sm italic">{{ $error }}</li>
                    @endforeach

                </ul>

            @endif
        </div> --}}

        <div>

        </div>
    </div>
</x-layout>
