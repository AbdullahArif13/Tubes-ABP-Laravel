@props(['id', 'name', 'label', 'type' => 'text', 'value' => ''])

<div class="relative w-full" x-data="{ show: false, hasValue: '{{ $value }}'.length > 0 }">
    <input 
        id="{{ $id }}" 
        name="{{ $name }}" 
        :type="{{ $type === 'password' }} ? (show ? 'text' : 'password') : '{{ $type }}'"
        value="{{ $value }}"
        @input="hasValue = $event.target.value.length > 0"
        {{ $attributes->merge(['class' => 'peer w-full px-4 py-2 text-sm border-2 border-gray-300 rounded-sm focus:outline-none focus:border-[#FF8D28] transition-all']) }}
        placeholder=" "
    >
    <label 
        for="{{ $id }}"
        class="absolute left-3 px-1 bg-white transition-all pointer-events-none text-gray-500"
        :class="hasValue ? '-top-2.5 text-xs text-black' : 'top-2 text-sm text-gray-500 peer-focus:-top-2.5 peer-focus:text-xs peer-focus:text-black'"
    >
        {{ $label }}
    </label>

    @if($type === 'password')
        <button 
            type="button" 
            @click="show = !show"
            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700"
        >
            <template x-if="!show">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.88 9.88L14.12 14.12"/><path d="M2 2l20 20"/><path d="M10.37 4.37a9 9 0 0 1 8.7 5.03"/><path d="M22 12a9 9 0 0 1-5 7.91"/><path d="M12 17a5 5 0 0 1-5-5"/><path d="M5 5a9 9 0 0 0-4 7 9 9 0 0 0 18 0 9 9 0 0 0-7-8.73"/></svg>
            </template>
            <template x-if="show">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
            </template>
        </button>
    @endif
</div>