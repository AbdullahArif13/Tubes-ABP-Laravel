{{-- Card Utama --}}
<div {{ $attributes->merge(['class' => 'bg-white text-gray-950 flex flex-col gap-6 rounded-xl border py-6 shadow-sm']) }}>
    {{ $slot }}
</div>

{{-- Card Header (Gunakan grid untuk support Action) --}}
{{-- resources/views/components/ui/card/header.blade.php --}}
<div {{ $attributes->merge(['class' => 'grid items-start gap-2 px-6 has-[.card-action]:grid-cols-[1fr_auto]']) }}>
    {{ $slot }}
</div>

{{-- Card Action (Slot khusus tombol) --}}
{{-- resources/views/components/ui/card/action.blade.php --}}
<div class="card-action col-start-2 row-span-2 row-start-1 self-start justify-self-end">
    {{ $slot }}
</div>