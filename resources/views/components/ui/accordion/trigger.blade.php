<div class="flex">
    <button type="button"
        @click="active = (active === id ? null : id)"
        :aria-expanded="active === id"
        {{ $attributes->merge(['class' => 'flex flex-1 items-start justify-between gap-4 py-4 text-left text-sm font-medium transition-all outline-none hover:underline disabled:pointer-events-none disabled:opacity-50']) }}>
        {{ $slot }}
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
             class="text-muted-foreground shrink-0 translate-y-0.5 transition-transform duration-200"
             :class="active === id ? 'rotate-180' : ''">
            <path d="m6 9 6 6 6-6"/>
        </svg>
    </button>
</div>