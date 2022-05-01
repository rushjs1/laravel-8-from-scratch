@props(['name'])

<x-form.field>
        <x-form.label name="{{ $name }}" />
        <textarea class="border border-gray-200 p-2 w-full rounded-lg" 
        style="resize: none;" 
        id="{{ $name }}" 
        name="{{ $name }}" 
        required
        {{ $attributes }}
        > 
        {{ $slot ?? old($name) }}
    </textarea>
        <x-form.error name="{{ $name }}" />
</x-form.field>