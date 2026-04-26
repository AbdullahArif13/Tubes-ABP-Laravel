<div class="w-full border-gray-200 rounded-xl overflow-hidden shadow-sm">
    {{-- Header Tabel --}}
    <div class="grid grid-cols-[1.6fr_0.8fr_0.8fr_1.0fr_0.5fr_0.5fr] px-6 py-4 border-b border-[#6C7AA0] text-sm font-semibold text-gray-900 bg-white">
        <div>Daftar Hewan</div>
        <div>Harga</div>
        <div>Status</div>
        <div>Tanggal Terakhir Update</div>
        <div>Edit</div>
        <div>Hapus</div>
    </div>

    {{-- Body Tabel --}}
    <div class="divide-y bg-gray-50/30 p-1">
        @foreach($animals as $item)
        <div class="my-4 grid grid-cols-[1.6fr_0.8fr_0.8fr_1.0fr_0.5fr_0.5fr] px-6 py-3 items-center bg-white rounded-[2rem] shadow-sm mx-2">
            {{-- Info Hewan --}}
            <div class="flex items-center gap-3 min-w-0">
                <div class="relative w-10 h-10 rounded-full overflow-hidden flex-shrink-0 border border-gray-100">
                    <img src="{{ asset($item['animalImage']) }}" alt="{{ $item['animalName'] }}" class="object-cover w-full h-full">
                </div>
                <div class="min-w-0">
                    <p class="font-semibold text-xs text-gray-900 leading-5 truncate">{{ $item['animalName'] }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ $item['animalBreed'] }}</p>
                </div>
            </div>

            {{-- Harga --}}
            <div class="text-xs text-gray-900 font-medium">
                {{-- Fungsi formatRupiah bisa dibuat di helper Laravel atau langsung di sini --}}
                Rp {{ number_format($item['price'], 0, ',', '.') }}
            </div>

            {{-- Status --}}
            <div class="text-xs">
                <span class="px-2 py-1 rounded-full {{ $item['status'] == 'Tersedia' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                    {{ $item['status'] }}
                </span>
            </div>

            {{-- Update Terakhir --}}
            <div class="text-xs text-gray-500">{{ $item['timeInText'] }}</div>

            {{-- Action Buttons --}}
            <a href="{{ route('hewan.edit', $item['id']) }}" class="cursor-pointer hover:scale-110 transition-transform">
                <img src="{{ asset('assets/icons/edit.svg') }}" alt="edit" width="25" height="25">
            </a>
            
            <form action="{{ route('hewan.delete', $item['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="cursor-pointer hover:scale-110 transition-transform">
                    <img src="{{ asset('assets/icons/delete.svg') }}" alt="delete" width="25" height="25">
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>

{{-- Pagination UI (Manual / Custom) --}}
<div class="flex justify-between items-center my-4 px-2">
    {{-- Prev Button --}}
    <a href="{{ $animals_pagination['prev_page_url'] ?? '#' }}" 
       class="flex items-center gap-1 px-4 py-2 rounded-md border text-xs font-medium transition-colors {{ $animals_pagination['current_page'] == 1 ? 'border-gray-200 text-gray-300 cursor-not-allowed' : 'border-gray-300 text-gray-500 bg-white hover:bg-gray-50' }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
        Prev
    </a>

    {{-- Page Numbers --}}
    <div class="flex items-center gap-x-2">
        @for ($i = 1; $i <= $animals_pagination['last_page']; $i++)
            <a href="?page={{ $i }}" 
               class="w-8 h-8 flex items-center justify-center rounded-md text-xs font-semibold transition-all {{ $animals_pagination['current_page'] == $i ? 'bg-orange-500 text-white shadow-sm' : 'bg-white text-gray-500 border border-gray-300 hover:bg-gray-50' }}">
                {{ $i }}
            </a>
        @endfor
    </div>

    {{-- Next Button --}}
    <a href="{{ $animals_pagination['next_page_url'] ?? '#' }}" 
       class="flex items-center gap-1 px-4 py-2 rounded-md border text-xs font-medium transition-colors {{ $animals_pagination['current_page'] == $animals_pagination['last_page'] ? 'border-gray-200 text-gray-300 cursor-not-allowed' : 'border-gray-300 text-gray-500 bg-white hover:bg-gray-50' }}">
        Next
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
    </a>
</div>