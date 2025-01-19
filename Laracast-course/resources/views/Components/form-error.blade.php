@props(['name'])
@error($name)
    <p class="text-sm italic text-red-400">{{ $message }}</p>
@enderror
