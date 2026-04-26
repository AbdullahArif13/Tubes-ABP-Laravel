@props(['value'])
<div {{ $attributes->merge(['class' => 'border-b last:border-b-0']) }} x-data="{ id: '{{ $value }}' }">
    {{ $slot }}
</div>