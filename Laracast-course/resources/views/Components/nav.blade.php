@props(['active' => false])

<a {{ $attributes }}
    class='{{ $active ? 'text-white bg-gray-900' : ' text-gray-300' }} block rounded-md px-3 py-2 text-base font-medium hover:bg-gray-700 hover:text-white'>{{ $slot }}</a>
