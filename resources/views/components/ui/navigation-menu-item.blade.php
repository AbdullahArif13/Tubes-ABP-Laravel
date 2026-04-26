@props(['id'])
<li class="relative" @mouseenter="open = '{{ $id }}'" @mouseleave="open = null">
    {{ $slot }}
</li>