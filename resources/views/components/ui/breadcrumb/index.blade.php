<nav aria-label="breadcrumb">
    <ol {{ $attributes->merge(['class' => 'flex flex-wrap items-center gap-1.5 text-sm text-gray-500']) }}>
        {{ $slot }}
    </ol>
</nav>