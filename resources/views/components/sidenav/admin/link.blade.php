@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex space-x-3 items-center px-2 pt-2 text-sm font-medium leading-5 text-gray-100 focus:outline-none transition'
: 'inline-flex space-x-3 items-center px-2 pt-2 text-sm font-medium leading-5 text-blue-400 transition hover:text-gray-100';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
