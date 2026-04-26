@php
    /**
     * Replikasi logika dari shelter-context.js:
     * hasShelter = Boolean(shelter?.statusShelter === true)
     */
    $user = auth()->user();
    $hasShelter = $user && $user->shelter && $user->shelter->status_shelter === true;

    $navItems = [
        ['label' => 'Menu',       'route' => 'home',             'icon' => 'menu',    'activeIcon' => 'menuActive'],
        ['label' => 'Form',       'route' => 'form.index',       'icon' => 'form',    'activeIcon' => 'formActive'],
        ['label' => 'Pembayaran', 'route' => 'pembayaran.index', 'icon' => 'payment', 'activeIcon' => 'paymentActive'],
        ['label' => 'Shelter',    'route' => 'profile.index',    'icon' => 'profile', 'activeIcon' => 'profileActive'],
    ];
@endphp

<div class="w-[88px] min-h-screen bg-white flex flex-col items-center py-6 border-r border-gray-100">
    <x-column class="gap-8 flex-1 items-center">
        @foreach($navItems as $item)
            @php 
                $active = request()->routeIs($item['route']);
                // Visual feedback jika navigasi terkunci (opacity 40% & cursor not allowed)
                $opacity = !$hasShelter ? 'opacity-40 cursor-not-allowed' : 'hover:text-gray-700 cursor-pointer';
                $color = ($active && $hasShelter) ? 'text-orange-500' : 'text-gray-500';
                
                // Tentukan icon (Active vs Inactive)
                $iconName = ($active && $hasShelter) ? $item['activeIcon'] : $item['icon'];
            @endphp

            <a 
                href="{{ $hasShelter ? route($item['route']) : '#' }}"
                class="flex flex-col items-center gap-1 transition {{ $color }} {{ $opacity }}"
                @if(!$hasShelter) onclick="return false;" @endif
            >
                <img 
                    src="{{ asset(config('assets.icons.' . $iconName)) }}" 
                    alt="{{ $item['label'] }}"
                    class="w-[22px] h-[22px] object-cover"
                >
                <span class="text-[11px] font-medium">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </x-column>

    {{-- Logout Section --}}
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="mt-6 flex flex-col items-center gap-1 text-gray-500 hover:text-red-500 transition cursor-pointer">
            <img src="{{ asset(config('assets.icons.signOut')) }}" class="w-5 h-5" alt="Keluar">
            <span class="text-[11px] font-medium">Keluar</span>
        </button>
    </form>
</div>