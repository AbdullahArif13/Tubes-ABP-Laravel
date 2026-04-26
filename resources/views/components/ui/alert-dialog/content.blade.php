<template x-teleport="body">
    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div x-show="open" 
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/50 transition-opacity" @click="open = false"></div>

        <div x-show="open"
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
             {{ $attributes->merge(['class' => 'relative bg-white grid w-full max-w-lg gap-4 border p-6 shadow-lg duration-200 rounded-lg z-50']) }}>
            {{ $slot }}
        </div>
    </div>
</template>