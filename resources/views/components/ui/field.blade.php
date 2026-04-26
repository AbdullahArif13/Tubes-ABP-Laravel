@props(['label', 'error' => null, 'description' => null])

<div {{ $attributes->merge(['class' => 'flex flex-col gap-1.5']) }}>
    @if(isset($label))
        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 {{ $error ? 'text-red-500' : '' }}">
            {{ $label }}
        </label>
    @endif

    {{ $slot }}

    @if($description)
        <p class="text-sm text-gray-500 leading-normal">{{ $description }}</p>
    @endif

    @if($error)
        <p class="text-sm font-medium text-red-500">{{ $error }}</p>
    @endif
</div>