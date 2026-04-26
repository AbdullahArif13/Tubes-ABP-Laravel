@props(['side' => 'right'])

@php
    $sides = [
        'right'  => 'inset-y-0 right-0 h-full w-3/4 border-l translate-x-full',
        'left'   => 'inset-y-0 left-0 h-full w-3/4 border-r -translate-x-full',
        'top'    => 'inset-x-0 top-0 h-auto border-b -translate-y-full',
        'bottom' => 'inset-x-0 bottom-0 h-auto border-t translate-y-full',
    ];
    $activeSide = $sides[$side] ?? $sides['right'];
@endphp

<div x-data="{ open: false }" @toggle-sheet.window="open = !open" x-cloak>
    <template x-teleport="body">
        <div x-show="open" class="fixed inset-0 z-50 flex">
            <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black/50" @click="open = false"></div>
            
            <div x-show="open" 
                 x-transition:enter="transition ease-in-out duration-300 transform"
                 x-transition:enter-start="{{ $activeSide }}"
                 x-transition:enter-end="translate-x-0 translate-y-0"
                 x-transition:leave="transition ease-in-out duration-300 transform"
                 x-transition:leave-end="{{ $activeSide }}"
                 class="fixed z-50 bg-white p-6 shadow-lg transition {{ $activeSide === 'inset-y-0 right-0 h-full w-3/4 border-l translate-x-full' || $activeSide === 'inset-y-0 left-0 h-full w-3/4 border-r -translate-x-full' ? 'h-full w-3/4 sm:max-w-sm' : 'w-full' }}">
                
                {{ $slot }}
                
                <button @click="open = false" class="absolute top-4 right-4 opacity-70 hover:opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
    </template>
</div>