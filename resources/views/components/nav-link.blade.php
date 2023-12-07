@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex flex-col items-center justify-center px-4 py-2 text-sm font-semibold leading-5 text-blue-600 bg-white focus:outline-none focus:text-primary-700 transition duration-150 ease-in-out'
            : 'flex flex-col items-center justify-center px-4 py-2 text-sm font-semibold leading-5 text-white hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
