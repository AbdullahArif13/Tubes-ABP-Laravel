<div class="flex flex-col">
    <div class="relative flex items-center py-5">
        <div class="flex-grow border-t border-gray-200"></div>
        <span class="flex-shrink mx-4 text-gray-400 text-xs uppercase tracking-widest">Or Sign up with</span>
        <div class="flex-grow border-t border-gray-200"></div>
    </div>

    <div class="flex flex-row justify-between gap-4 mt-4">
        @php
            $socials = [
                ['id' => 'facebook', 'icon' => 'facebook.svg'],
                ['id' => 'google', 'icon' => 'google.svg'],
                ['id' => 'apple', 'icon' => 'apple.svg']
            ];
        @endphp

        @foreach($socials as $s)
            <button type="button" class="flex-1 h-[70px] border border-[#515DEF] hover:bg-stone-50 flex justify-center items-center rounded-sm transition-colors">
                <img src="{{ asset('assets/icons/' . $s['icon']) }}" alt="{{ $s['id'] }}" width="30">
            </button>
        @endforeach
    </div>
</div>