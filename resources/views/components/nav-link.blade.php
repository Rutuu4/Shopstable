@props(['active'])

@php
$classes = ($active ?? false)
? 'flex w-full pl-3 font-semibold border-l-4 border-indigo-200 transition duration-150 ease-in-out'
: 'flex w-full pl-4 transition duration-150 ease-in-out';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>
