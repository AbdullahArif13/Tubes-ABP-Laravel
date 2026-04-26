<div class="flex flex-row gap-12">
    {{-- Banner Section --}}
    <div class="relative w-1/2 rounded-lg p-6 flex flex-col overflow-hidden min-h-[180px]">
        {{-- Background Image dengan Overlay --}}
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('assets/images/shelter_placeholder.png') }}');"></div>
        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10">
            <h2 class="font-semibold text-neutral-50 text-xl mb-1">Ayo Buat Shelter Kamuu</h2>
            <p class="text-neutral-50 text-sm">Berikan Kenyamanan buat hewanmu</p>

            <div class="mt-8">
                @if(!$hasShelter)
                    <a href="{{ route('buat_shelter') }}" class="inline-flex items-center px-6 py-2 bg-[#FF8D28] hover:bg-[#FBA81F] text-white text-sm font-medium rounded-sm transition">
                        Buat Shelter
                    </a>
                @else
                    <a href="{{ route('tambah_hewan') }}" class="inline-flex items-center px-6 py-2 bg-[#198754] hover:bg-[#157347] text-white text-sm font-medium rounded-sm transition">
                        Tambah Hewan
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- Stats Hewan Section --}}
    <div class="flex flex-col flex-1">
        <h2 class="font-semibold text-xl mb-1 text-gray-900">Hewan di Shelter kamu</h2>
        <p class="text-sm mb-5 text-gray-600">Jaga Hewan Kamu dengan baik sebelum adopsi</p>

        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-4">
                <div class="bg-[#FD7E14] rounded-full p-3 flex items-center justify-center">
                    <img src="{{ asset('assets/icons/note.svg') }}" alt="note" class="w-[15px] h-[15px] brightness-0 invert">
                </div>
                <div class="flex flex-col">
                    <span class="font-semibold text-lg text-gray-900">6</span>
                    <span class="text-xs text-[#68676E]">Hewan yang siap di adopsi</span>
                </div>
            </div>
        </div>
    </div>
</div>