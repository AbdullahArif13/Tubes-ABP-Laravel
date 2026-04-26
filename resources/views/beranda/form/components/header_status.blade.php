<div class="flex flex-row gap-5">
    @php
        $stats = [
            ['label' => 'Form Masuk', 'value' => '24.000', 'color' => '#6F4FF2'],
            ['label' => 'Form Diterima', 'value' => '82.000', 'color' => '#50BB25'],
            ['label' => 'Form Ditolak', 'value' => '89', 'color' => '#DC3546']
        ];
    @endphp

    @foreach($stats as $stat)
    <div class="w-1/4 bg-white rounded-xl p-3 shadow-sm flex flex-row items-center gap-3">
        <div class="rounded-full p-3 flex items-center justify-center" style="background-color: {{ $stat['color'] }}">
            <img src="{{ asset('assets/icons/note.svg') }}" alt="icon" class="w-[15px] h-[15px] brightness-0 invert">
        </div>
        <div class="flex flex-col">
            <span class="font-semibold text-lg text-gray-900">{{ $stat['value'] }}</span>
            <span class="text-xs text-[#68676E]">{{ $stat['label'] }}</span>
        </div>
    </div>
    @endforeach
</div>