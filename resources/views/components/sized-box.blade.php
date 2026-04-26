@props(['height' => null, 'width' => null])

<div style="
    {{ $height ? "height: {$height}px;" : "" }}
    {{ $width ? "width: {$width}px;" : "" }}
"></div>