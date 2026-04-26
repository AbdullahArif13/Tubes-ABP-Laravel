<div x-data="{ 
    skip: 1,
    next() { this.skip = this.skip === 3 ? 1 : this.skip + 1; $refs.holder.scrollTo({left: (this.skip - 1) * $refs.holder.offsetWidth, behavior: 'smooth'}) },
    prev() { this.skip = this.skip === 1 ? 3 : this.skip - 1; $refs.holder.scrollTo({left: (this.skip - 1) * $refs.holder.offsetWidth, behavior: 'smooth'}) }
}" class="relative w-full">
    <div x-ref="holder" class="flex snap-x snap-mandatory overflow-x-hidden scroll-smooth">
        {{ $slot }}
    </div>
    
    {{-- Tombol Navigasi --}}
    <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 p-2 rounded-full shadow">
        <x-ui.icon name="chevron-left" />
    </button>
    <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 p-2 rounded-full shadow">
        <x-ui.icon name="chevron-right" />
    </button>
</div>