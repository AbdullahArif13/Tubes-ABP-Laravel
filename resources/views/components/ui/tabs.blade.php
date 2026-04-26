@props(['default'])
<div x-data="{ activeTab: '{{ $default }}' }" {{ $attributes->merge(['class' => 'flex flex-col gap-2']) }}>
    {{ $slot }}
</div>