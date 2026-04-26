@props(['variant' => 'default'])

@php
    $variants = [
        'default' => 'border-transparent bg-[#FF8D28] text-white',
        'secondary' => 'border-transparent bg-gray-100 text-gray-900',
        'destructive' => 'border-transparent bg-red-100 text-red-600',
        'outline' => 'text-gray-950 border-gray-200',
    ];
    $class = $variants[$variant] ?? $variants['default'];
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center justify-center rounded-full border px-2.5 py-0.5 text-xs font-medium transition-colors $class"]) }}>
    {{ $slot }}
</span>