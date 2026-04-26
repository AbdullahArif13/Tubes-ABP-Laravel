<div x-data="{ open: false }" @keydown.escape.window="open = false" x-cloak>
    {{ $slot }}
</div>