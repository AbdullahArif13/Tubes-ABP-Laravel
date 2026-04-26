@props(['variant' => 'default'])

@php
    $variants = [
        'default' => 'bg-white text-gray-950',
        'destructive' => 'text-red-600 border-red-600/50 bg-white [&>svg]:text-red-600',
    ];
    $variantClass = $variants[$variant] ?? $variants['default'];
@endphp

<div role="alert" 
    {{ $attributes->merge(['class' => "relative w-full rounded-lg border px-4 py-3 text-sm grid has-[>svg]:grid-cols-[16px_1fr] grid-cols-[0_1fr] has-[>svg]:gap-x-3 gap-y-0.5 items-start $variantClass"]) }}>
    {{ $slot }}
</div>