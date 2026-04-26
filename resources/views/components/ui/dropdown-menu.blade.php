<div x-data="{ open: false }" @click.away="open = false" class="relative inline-block text-left">
    <div @click="open = !open" class="cursor-pointer">
        {{ $trigger }}
    </div>

    <div x-show="open" 
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         class="absolute right-0 z-50 mt-2 w-56 origin-top-right rounded-md border bg-white p-1 shadow-md outline-none">
        {{ $slot }}
    </div>
</div>