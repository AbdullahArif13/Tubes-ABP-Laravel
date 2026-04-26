@props(['value'])
<button 
    @click="activeTab = '{{ $value }}'"
    :class="activeTab === '{{ $value }}' ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500 hover:text-gray-700'"
    {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md px-3 py-1.5 text-sm font-medium transition-all outline-none']) }}>
    {{ $slot }}
</button>