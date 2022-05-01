@props(['name'])

@error($name)
            <p class="text-red-500 text-xs semibold mt-2"> {{ $message }} </p>
@enderror