@props(['value' => 0])

<div {{ $attributes->merge(['class' => 'relative h-2 w-full overflow-hidden rounded-full bg-orange-100']) }}>
    <div class="h-full w-full flex-1 bg-[#FF8D28] transition-all duration-500" 
         style="transform: translateX(-{{ 100 - $value }}%)">
    </div>
</div>