@props(['name'])

@error($name)
    <p class="text-red-500 text-sm lg:text-xs mt-1"> {{$message}} </p>
@enderror