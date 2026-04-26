<div x-data="{ open: false }" @toggle-drawer.window="open = !open" x-cloak>
    <template x-teleport="body">
        <div x-show="open" class="fixed inset-0 z-50 flex items-end justify-center">
            <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black/50" @click="open = false"></div>
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="translate-y-full"
                 x-transition:enter-end="translate-y-0"
                 class="relative w-full max-h-[80vh] bg-white rounded-t-xl border-t p-4 z-50 shadow-xl overflow-y-auto">
                <div class="mx-auto mt-2 h-1.5 w-12 rounded-full bg-gray-300 mb-6"></div>
                {{ $slot }}
            </div>
        </div>
    </template>
</div>