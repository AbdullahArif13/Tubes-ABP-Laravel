<nav role="navigation" aria-label="pagination" {{ $attributes->merge(['class' => 'mx-auto flex w-full justify-center']) }}>
    <ul class="flex flex-row items-center gap-1">
        {{ $slot }}
    </ul>
</nav>