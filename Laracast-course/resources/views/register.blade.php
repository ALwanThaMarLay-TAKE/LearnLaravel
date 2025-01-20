<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>
    <div class="space-y-4">
        <div class="w-1/2">
            <form class="space-y-6" action="/register" method="POST">
                @csrf
                <div>
                    <x-form-label for="name">Name</x-form-label>
                    <div class="mt-2">

                        <x-form-input type="name" name="name" id="name" />

                    </div>
                    <div class="mt-1">
                        <x-form-error name="name" />
                    </div>
                </div>
                <div>
                    <x-form-label for="email">Email</x-form-label>
                    <div class="mt-2">

                        <x-form-input type="email" name="email" id="email" />

                    </div>
                    <div class="mt-1">
                        <x-form-error name="email" />
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <x-form-label for="password">Password</x-form-label>

                    </div>
                    <div class="mt-2">
                        <x-form-input type="password" name="password" id="password" />
                    </div>
                    <div class="mt-1">

                        <x-form-error name='password' />
                    </div>
                </div>
                <div>
                    <x-form-label for="password_confirmation">Password Confirmation</x-form-label>
                    <div class="mt-2">

                        <x-form-input type="password_confirmation" name="password_confirmation" id="password_confirmation" />

                    </div>
                    <div class="mt-1">
                        <x-form-error name="password_confirmation" />
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
                </div>
            </form>
        </div>

        <div>

        </div>
    </div>
</x-layout>
