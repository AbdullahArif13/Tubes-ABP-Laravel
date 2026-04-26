<div class="w-full border-gray-200 rounded-xl overflow-hidden mt-6">
    {{-- Header Tabel --}}
    <div class="grid grid-cols-[1.6fr_0.8fr_0.8fr_0.9fr_0.5fr_0.5fr] px-6 py-4 border-b border-[#6C7AA0] text-sm font-semibold text-gray-900">
        <div>Daftar Hewan</div>
        <div>Lihat Form</div>
        <div>Waktu Masuk</div>
        <div>User</div>
        <div>Setuju</div>
        <div>Tolak</div>
    </div>

    {{-- Body Tabel --}}
    <div class="divide-y space-y-4 mt-4">
        {{-- Asumsi data dikirim dari controller sebagai $currentPosts --}}
        @foreach($currentPosts as $item)
        <div class="grid grid-cols-[1.6fr_0.8fr_0.8fr_0.9fr_0.5fr_0.5fr] px-6 py-3 items-center bg-white rounded-[2rem] shadow-sm">
            {{-- Daftar Hewan --}}
            <div class="flex items-center gap-3 min-w-0">
                <div class="relative w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                    <img src="{{ asset($item['animalImage']) }}" class="object-cover w-full h-full">
                </div>
                <div class="min-w-0">
                    <p class="font-semibold text-xs text-gray-900 leading-5 truncate">{{ $item['animalName'] }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ $item['animalBreed'] }}</p>
                </div>
            </div>

            <div class="text-xs text-gray-900">{{ $item['pdf'] }}</div>
            <div class="text-xs text-gray-900">{{ $item['timeInText'] }}</div>

            {{-- User --}}
            <div class="flex items-center gap-3 min-w-0">
                <div class="relative w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                    <img src="{{ asset($item['userAvatar']) }}" class="object-cover w-full h-full">
                </div>
                <p class="text-xs text-gray-900 truncate">{{ $item['userName'] }}</p>
            </div>

            {{-- Actions --}}
            <button class="cursor-pointer hover:opacity-70">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
            </button>
            <button class="cursor-pointer hover:opacity-70">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </div>
        @endforeach
    </div>
</div>

{{-- Pagination UI --}}
<div class="flex justify-between items-center my-6">
    <button class="flex items-center gap-1 px-4 py-2 rounded-md border border-gray-300 text-xs font-medium bg-white text-gray-500 hover:bg-gray-50 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
        Prev
    </button>

    <div class="flex items-center gap-x-2">
        @for ($i = 1; $i <= $totalPages; $i++)
            <button class="w-8 h-8 flex items-center justify-center rounded-md text-xs font-semibold {{ $currentPage == $i ? 'bg-orange-500 text-white shadow-sm' : 'bg-white text-gray-500 border border-gray-300 hover:bg-gray-50' }} cursor-pointer">
                {{ $i }}
            </button>
        @endfor
    </div>

    <button class="flex items-center gap-1 px-4 py-2 rounded-md border border-gray-300 text-xs font-medium bg-white text-gray-500 hover:bg-gray-50 cursor-pointer">
        Next
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
    </button>
</div>