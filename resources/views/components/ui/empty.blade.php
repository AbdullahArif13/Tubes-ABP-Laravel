<div {{ $attributes->merge(['class' => 'flex min-w-0 flex-1 flex-col items-center justify-center gap-6 rounded-lg border-2 border-dashed p-6 text-center md:p-12']) }}>
    <div class="flex flex-col items-center gap-2 max-w-sm">
        {{ $slot }}
    </div>
</div>