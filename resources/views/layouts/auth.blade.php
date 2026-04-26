<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - HewanKu</title>

    {{-- INI ADALAH JEMBATAN KE CSS DAN JS KAMU --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white min-h-screen font-sans antialiased">
    <div class="flex min-h-screen">
        
        <div class="flex-1 flex flex-col px-8 py-12 sm:px-12 lg:px-20 overflow-y-auto">
            
            <div class="mb-12">
                <img src="{{ asset('assets/icons/logo.svg') }}" alt="Logo" class="h-8 w-auto">
            </div>

            <div class="flex-1 flex flex-col justify-center max-w-[460px] mx-auto w-full">
                @yield('content')
            </div>

            <div class="mt-8 text-[10px] text-gray-400">
                &copy; 2026 HewanKu. All rights reserved.
            </div>
        </div>

        <div class="hidden lg:block lg:w-1/2 p-4">
            <div class="h-full w-full rounded-3xl bg-gray-100 overflow-hidden shadow-sm">
                <img src="{{ asset('assets/image/login_mockup.png') }}" 
                     alt="Mockup" 
                     class="w-full h-full object-cover">
            </div>
        </div>

    </div>
</body>