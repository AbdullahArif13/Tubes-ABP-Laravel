@props(['variant' => 'default', 'size' => 'default'])

@php
    $variants = [
        'default' => 'bg-transparent',
        'outline' => 'border-gray-200',
        'muted' => 'bg-gray-50',
    ];
@endphp

<div {{ $attributes->merge(['class' => "group/item flex items-center border border-transparent text-sm rounded-md transition-colors p-4 gap-4 " . $variants[$variant]]) }}>
    {{ $slot }}
</div>