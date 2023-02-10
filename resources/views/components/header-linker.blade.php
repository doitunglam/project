@props(['href'])
@php
$classes = 'no-underline sm:text-2xl text-black sm:m-4 m-2 text-xl'
@endphp

<a {{$attributes->merge(['class' => $classes,'href'=>$href])}}>
    {{$slot}}
</a>
