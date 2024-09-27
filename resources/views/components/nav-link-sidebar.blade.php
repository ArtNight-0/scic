@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-1 pt-1 border-b-2 bg-dark-400 dark:bg-dark-600 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:bg-dark-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 bg-b-2 bg-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
