@props(['active' => false])
<li>
    <a {{ $attributes->merge(['class' => "inline-flex h-9 w-9 items-center justify-center rounded-md text-sm font-medium transition-colors hover:bg-gray-100 " . ($active ? 'border border-gray-200 bg-white shadow-sm' : 'text-gray-500')]) }}>
        {{ $slot }}
    </a>
</li>