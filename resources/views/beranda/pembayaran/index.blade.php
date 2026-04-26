@extends('layouts.beranda')

@section('title', 'Pembayaran')

@section('content')
<div class="flex flex-col items-start w-full">
    <h1 class="font-semibold text-xl mb-4 text-gray-900">Pembayaran</h1>

    <div class="w-full border-gray-200 rounded-xl overflow-hidden">
        {{-- Header Tabel --}}
        <div class="grid grid-cols-[1.6fr_0.8fr_0.8fr_0.9fr_0.9fr] px-6 py-4 border-b-2 border-[#6C7AA0] text-sm font-semibold text-gray-900 bg-white">
            <div>Daftar Hewan</div>
            <div>Harga</div>
            <div>Pembayaran</div>
            <div>User</div>
            <div>Waktu Masuk</div>
        </div>

        {{-- Body Tabel --}}
        <div class="divide-y bg-gray-50/10">
            @php
                $paymentLogoMap = [
                    'qris' => 'qris_logo.png',
                    'mandiri' => 'mandiri_logo.png',
                    'gopay' => 'gopay_logo.png',
                    'dana' => 'dana_logo.png',
                ];
            @endphp

            @foreach($payments as $item)
            <div class="my-4 grid grid-cols-[1.6fr_0.8fr_0.8fr_0.9fr_0.9fr] px-6 py-2 items-center bg-white rounded-[2rem] shadow-sm mx-2">
                {{-- Info Hewan --}}
                <div class="flex items-center gap-3 min-w-0">
                    <div class="relative w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                        <img src="{{ asset($item['animalImage']) }}" class="object-cover w-full h-full">
                    </div>
                    <div class="min-w-0">
                        <p class="font-semibold text-xs text-gray-900 leading-5 truncate">{{ $item['animalName'] }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ $item['animalBreed'] }}</p>
                    </div>
                </div>

                {{-- Harga --}}
                <div class="text-xs text-gray-900">
                    Rp {{ number_format($item['price'], 0, ',', '.') }}
                </div>

                {{-- Pembayaran (Logo) --}}
                <div class="flex items-center">
                    @php 
                        $logo = $paymentLogoMap[$item['paymentMethod']] ?? 'default.png';
                        $size = $item['paymentMethod'] == 'qris' ? 'w-10' : 'w-12';
                    @endphp
                    <img src="{{ asset('assets/images/' . $logo) }}" alt="payment" class="{{ $size }} object-contain">
                </div>

                {{-- User --}}
                <div class="flex items-center gap-3 min-w-0">
                    <div class="relative w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                        <img src="{{ asset($item['userAvatar']) }}" class="object-cover w-full h-full">
                    </div>
                    <p class="text-xs text-gray-900 truncate">{{ $item['userName'] }}</p>
                </div>

                {{-- Waktu --}}
                <div class="text-xs text-gray-900">{{ $item['timeInText'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Pagination Bar --}}
    <div class="flex justify-between items-center w-full mt-6">
        <button class="flex items-center gap-1 px-4 py-2 rounded-md border border-gray-200 text-xs font-medium text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            Prev
        </button>

        <div class="flex items-center gap-x-2">
            @for ($i = 1; $i <= $pagination['last_page']; $i++)
                <button class="w-8 h-8 flex items-center justify-center rounded-md text-xs font-semibold {{ $pagination['current_page'] == $i ? 'bg-orange-500 text-white' : 'bg-white text-gray-500 border border-gray-300' }}">
                    {{ $i }}
                </button>
            @endfor
        </div>

        <button class="flex items-center gap-1 px-4 py-2 rounded-md border border-gray-300 text-xs font-medium bg-white text-gray-500 hover:bg-gray-50">
            Next
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </button>
    </div>
</div>
@endsection