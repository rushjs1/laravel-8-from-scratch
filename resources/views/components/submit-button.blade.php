<button {{ $attributes->merge(['class' => 'bg-blue-500 text-white uppercase font-semibold py-2 px-6 rounded-2xl block text-xs hover:bg-blue-600']) }}  type="submit">
    {{$slot}}
</button>