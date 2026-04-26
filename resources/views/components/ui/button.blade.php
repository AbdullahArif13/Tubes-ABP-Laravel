@props([
    'variant' => 'default',
    'size' => 'default',
    'asChild' => false
])

@php
    $baseStyles = "inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 outline-none focus-visible:ring-[3px] focus-visible:ring-orange-500/20";
    
    $variants = [
        'default' => 'bg-[#FF8D28] text-white hover:bg-[#FBA81F]',
        'destructive' => 'bg-red-600 text-white hover:bg-red-700',
        'outline' => 'border border-gray-200 bg-white shadow-sm hover:bg-gray-50',
        'secondary' => 'bg-gray-100 text-gray-900 hover:bg-gray-200',
        'ghost' => 'hover:bg-gray-100 hover:text-gray-900',
        'link' => 'text-[#FF8D28] underline-offset-4 hover:underline',
    ];

    $sizes = [
        'default' => 'h-9 px-4 py-2',
        'sm' => 'h-8 px-3 text-xs',
        'lg' => 'h-10 px-8',
        'icon' => 'size-9',
    ];

    $classes = $baseStyles . ' ' . ($variants[$variant] ?? $variants['default']) . ' ' . ($sizes[$size] ?? $sizes['default']);
@endphp

@if($asChild)
    {{ $slot }}
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif