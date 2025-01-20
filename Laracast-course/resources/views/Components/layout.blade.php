<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        @vite('resources/css/app.css')
    </head>

    <body class="h-full">

        <div class="min-h-full">
            <nav class="bg-gray-800">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">
                        <div class="flex-grow-1 flex items-center">
                            <div class="shrink-0">
                                <img class="size-8"
                                    src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                                    alt="Your Company">
                            </div>
                            <div class="">
                                <div class="ml-10 flex items-baseline space-x-4">

                                    <x-nav :active="request()->is('/')" href="/">Home</x-nav>

                                    <x-nav :active="request()->is('jobs')" href="/jobs">Jobs</x-nav>
                                    <x-nav :active="request()->is('contact')" href="/contact">Contact</x-nav>
                                </div>

                            </div>
                        </div>
@guest

<div class="flex gap-3">
    <x-nav :active="request()->is('login')" href="/login">Login</x-nav>
    <x-nav :active="request()->is('register')" href="/register">Register</x-nav>

</div>
@endguest
@auth

    <form action="/logout" method="POST"
    >
@csrf
<button class="block rounded-md px-3 py-2 text-base font-medium hover:bg-red-700 hover:text-white bg-red-400">Logout</button>
</form>

@endauth

                    </div>

                </div>
        </div>

        </nav>

        <header class="flex items-center justify-between bg-white px-5 shadow">
            <div class="max-w-7xl py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            </div>
            <div class="ml-4 flex items-center md:ml-6">

                <x-button href="/jobs/create">
                    Create Job
                </x-button>

            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }} </div>
        </main>
        </div>

    </body>

</html>
