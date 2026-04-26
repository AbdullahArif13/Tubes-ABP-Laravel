@props(['main' => 'start', 'cross' => 'center'])

@php
    $mainMap = [
        'start' => 'justify-start', 'center' => 'justify-center', 'end' => 'justify-end',
        'between' => 'justify-between', 'around' => 'justify-around', 'evenly' => 'justify-evenly'
    ];
    $crossMap = [
        'start' => 'items-start', 'center' => 'items-center', 'end' => 'items-end',
        'stretch' => 'items-stretch', 'baseline' => 'items-baseline'
    ];
@endphp

<div {{ $attributes->merge(['class' => "flex flex-row w-full " . $mainMap[$main] . " " . $crossMap[$cross]]) }}>
    {{ $slot }}
</div>