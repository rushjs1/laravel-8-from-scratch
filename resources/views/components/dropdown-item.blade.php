@props(['active' => false])
@php
    $classes = 'block text-left p-2 hover:bg-gray-200 focus:bg-gray-200';

    if ($active) $classes = $classes . 'bg-blue-500 text-white bg-blue-500';

@endphp

<a {{ $attributes->merge(['class' => $classes ])}}> {{ $slot }} </a>