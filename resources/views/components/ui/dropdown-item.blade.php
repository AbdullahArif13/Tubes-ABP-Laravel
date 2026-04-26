<button {{ $attributes->merge(['class' => 'relative flex w-full cursor-default items-center gap-2 rounded-sm px-2 py-1.5 text-sm outline-none transition-colors hover:bg-gray-100 focus:bg-gray-100']) }}>
    {{ $slot }}
</button>