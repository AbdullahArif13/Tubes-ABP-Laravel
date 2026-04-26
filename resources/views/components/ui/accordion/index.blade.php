<div {{ $attributes->merge(['class' => 'w-full']) }} x-data="{ active: null }">
    {{ $slot }}
</div>