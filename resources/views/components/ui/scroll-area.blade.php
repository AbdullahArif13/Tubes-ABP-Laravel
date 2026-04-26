<div {{ $attributes->merge(['class' => 'relative overflow-auto scrollbar-hide']) }}>
    {{ $slot }}
</div>

<style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
</style>