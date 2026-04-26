<button type="button" role="switch" x-data="{ checked: false }" @click="checked = !checked"
    :class="checked ? 'bg-[#FF8D28]' : 'bg-gray-200'"
    class="peer inline-flex h-[1.15rem] w-8 shrink-0 items-center rounded-full border-2 border-transparent transition-colors outline-none focus-visible:ring-2 focus-visible:ring-orange-500 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
    <span :class="checked ? 'translate-x-3.5' : 'translate-x-0'"
        class="pointer-events-none block size-4 rounded-full bg-white shadow-lg ring-0 transition-transform"></span>
</button>