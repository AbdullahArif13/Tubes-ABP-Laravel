@props(['placeholder' => 'Pilih opsi...'])

<div x-data="{ open: false, selected: '', label: '{{ $placeholder }}' }" class="relative w-full">
    <button @click="open = !open" type="button" 
            class="flex h-9 w-full items-center justify-between rounded-md border border-gray-200 bg-white px-3 py-2 text-sm shadow-sm outline-none focus:ring-1 focus:ring-orange-500 transition-all">
        <span x-text="label" :class="selected === '' ? 'text-gray-500' : 'text-gray-900'"></span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="opacity-50"><path d="m6 9 6 6 6-6"/></svg>
    </button>

    <div x-show="open" @click.away="open = false" x-cloak
         class="absolute z-50 mt-1 max-h-60 w-full overflow-auto rounded-md border bg-white p-1 shadow-md">
        {{ $slot }}
    </div>
</div>