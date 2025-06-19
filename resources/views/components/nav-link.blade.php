@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-accent-blue text-sm font-medium leading-5 text-text-light focus:outline-none focus:border-accent-gold transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-text-dark hover:text-text-light hover:border-dark-tertiary focus:outline-none focus:text-text-light focus:border-dark-tertiary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>