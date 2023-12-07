@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-blue-400 focus:ring-[3px] focus:ring-opacity-30 focus:ring-blue-300 rounded-md shadow-sm transition duration-150']) !!}>
