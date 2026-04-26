<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Hewanku') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        document.addEventListener('alpine:init', () => {
            // Replikasi logic use-mobile.js ke Global Store Alpine
            Alpine.store('screen', {
                isMobile: window.innerWidth < 768,
                init() {
                    window.addEventListener('resize', () => {
                        this.isMobile = window.innerWidth < 768;
                    });
                }
            });
        });
    </script>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-900">
    
    {{-- Toast Notification (Replikasi Sonner) --}}
    @if(session('success') || session('error'))
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 4000)"
             x-transition.opacity
             class="fixed top-4 right-4 z-[100] min-w-[300px]">
            <x-ui.alert variant="{{ session('success') ? 'default' : 'destructive' }}">
                <x-ui.alert-title>{{ session('success') ?? session('error') }}</x-ui.alert-title>
            </x-ui.alert>
        </div>
    @endif

    <div id="app">
        @yield('content')
    </div>

</body>
</html>