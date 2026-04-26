<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Shelter App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-[#F2F2F2]">
    {{-- Replikasi <Row> dari widget Next.js kamu --}}
    <div class="flex flex-row min-w-full">
        
        {{-- SidebarBeranda --}}
        @include('components.shared.sidebar_beranda')

        {{-- Main Content Area --}}
        {{-- Menggunakan p-12 dan bg-image sesuai layout.jsx kamu --}}
        <div class="flex-1 min-h-screen p-12 bg-no-repeat bg-[size:100%] bg-bottom" 
             style="background-image: url('{{ asset('images/bg_beranda.png') }}');">
            
            {{-- Tempat konten halaman anak dirender --}}
            @yield('content')
            
        </div>
    </div>
</body>
</html>