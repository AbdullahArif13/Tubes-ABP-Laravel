<div class="flex flex-col w-full">
    {{-- Divider --}}
    <div class="relative flex items-center py-5">
        <div class="flex-grow border-t border-gray-200"></div>
        <span class="flex-shrink mx-4 text-gray-400 text-xs uppercase tracking-widest font-medium">Or login with</span>
        <div class="flex-grow border-t border-gray-200"></div>
    </div>

    {{-- Social Buttons Row --}}
    <div class="flex flex-row justify-between gap-4 mt-4 w-full">
        @php
            $platforms = [
                ['name' => 'Facebook', 'icon' => 'facebook_icon.svg'],
                ['name' => 'Google', 'icon' => 'google_icon.svg'], // Pakai nama file yang benar
                ['name' => 'Apple', 'icon' => 'apple_icon.svg'],
            ];
        @endphp

        @foreach($platforms as $platform)
            <button 
                type="button" 
                class="flex-1 h-[60px] border border-[#515DEF] hover:bg-gray-50 flex justify-center items-center rounded-lg transition-all duration-200 cursor-pointer group"
                title="Login with {{ $platform['name'] }}"
            >
                <img 
                    src="{{ asset('assets/icons/' . $platform['icon']) }}" 
                    alt="{{ $platform['name'] }}" 
                    class="w-[28px] h-[28px] block pointer-events-none"
                >
            </button>
        @endforeach
    </div>
</div>