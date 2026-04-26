<div class="relative flex items-center" x-data="{ checked: false }">
    <input type="checkbox" 
        @change="checked = $el.checked"
        {{ $attributes->merge(['class' => 'peer size-4 shrink-0 rounded-[4px] border border-gray-300 shadow-sm transition-all outline-none focus-visible:ring-[3px] focus-visible:ring-orange-500/20 checked:bg-[#FF8D28] checked:border-[#FF8D28] disabled:cursor-not-allowed disabled:opacity-50 appearance-none']) }}>
    
    {{-- Icon Check --}}
    <div x-show="checked" class="absolute pointer-events-none text-white left-[3px] top-[3px]" x-cloak>
        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
    </div>
</div>