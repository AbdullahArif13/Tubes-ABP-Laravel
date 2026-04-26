<nav x-data="{ open: null }" class="relative flex max-w-max flex-1 items-center justify-center">
    <ul {{ $attributes->merge(['class' => 'group flex flex-1 list-none items-center justify-center gap-1']) }}>
        {{ $slot }}
    </ul>
</nav>