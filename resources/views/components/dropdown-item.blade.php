@props(['active' => false])

@php 
    $classes = 'block text-left py-5 lg:py-0 px-3 text-4xl lg:text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white';

    if ( $active ) {
        $classes = $classes . ' bg-blue-500 text-white';
    }
@endphp

<a {{ $attributes(['class' => $classes ]) }}> {{ $slot }} </a>