@props(['class' => ''])

<div {!! $attributes->merge(['class'  => $class ]) !!}>
    <p class="text-xl text-black">{{$slot}}</p>
</div>
