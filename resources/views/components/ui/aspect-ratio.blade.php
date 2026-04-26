@props(['ratio' => 1])

<div class="relative w-full" style="padding-bottom: {{ (1 / $ratio) * 100 }}%">
    <div class="absolute inset-0">
        {{ $slot }}
    </div>
</div>