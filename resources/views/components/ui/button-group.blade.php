@props(['orientation' => 'horizontal'])

<div {{ $attributes->merge(['class' => 'flex w-fit items-stretch ' . 
    ($orientation === 'horizontal' 
        ? '[&>*:not(:first-child)]:rounded-l-none [&>*:not(:first-child)]:border-l-0 [&>*:not(:last-child)]:rounded-r-none' 
        : 'flex-col [&>*:not(:first-child)]:rounded-t-none [&>*:not(:first-child)]:border-t-0 [&>*:not(:last-child)]:rounded-b-none')
]) }}>
    {{ $slot }}
</div>