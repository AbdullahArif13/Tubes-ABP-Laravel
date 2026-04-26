<div x-show="active === id" 
     x-collapse 
     x-cloak
     class="overflow-hidden text-sm transition-all">
    <div {{ $attributes->merge(['class' => 'pt-0 pb-4']) }}>
        {{ $slot }}
    </div>
</div>