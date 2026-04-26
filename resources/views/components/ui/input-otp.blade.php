<div class="flex items-center gap-2" x-data="{ otp: '' }">
    @for($i = 0; $i < 6; $i++)
        <input 
            type="text" 
            maxlength="1" 
            class="h-10 w-10 rounded-md border border-gray-200 text-center text-lg font-bold focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 outline-none transition-all"
            x-on:input="$el.nextElementSibling?.focus()"
        >
    @endfor
</div>