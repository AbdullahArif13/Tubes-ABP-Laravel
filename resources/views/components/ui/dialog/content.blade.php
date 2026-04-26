<template x-teleport="body">
    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black/50" @click="open = false"></div>
        <div x-show="open" x-transition.scale.95 
             {{ $attributes->merge(['class' => 'relative bg-white grid w-full max-w-lg gap-4 border p-6 shadow-lg rounded-lg z-50 outline-none']) }}>
            {{ $slot }}
            <button @click="open = false" class="absolute top-4 right-4 opacity-70 hover:opacity-100 transition-opacity">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
        </div>
    </div>
</template>