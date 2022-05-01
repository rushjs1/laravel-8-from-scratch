@props(['name', 'type' => 'text'])

<x-form.field>
    
        <x-form.label name="{{ $name }}" />
        <input name="{{ $name }}" 
               type="{{ $type }}"
               class="border border-gray-200 p-2 w-full rounded-lg" 
               style="resize:none;" 
               id="{{ $name }}" 
               {{ $attributes(['value' => old($name)]) }} 
               />
        <x-form.error name="{{ $name }}" />
</x-form.field>