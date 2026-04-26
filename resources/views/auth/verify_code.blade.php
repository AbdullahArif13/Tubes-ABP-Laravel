@extends('layouts.auth', ['mockup' => 'otp_mockup.png'])

@section('title', 'Verify Code')

@section('content')
    <div class="mt-10">
        <a href="{{ route('login') }}" class="flex flex-row items-center cursor-pointer group">
            <img src="{{ asset('assets/icons/back.svg') }}" alt="backIcon" class="w-5 h-5 transition-transform group-hover:-translate-x-1">
            <span class="ml-2 text-sm font-medium text-gray-700">Back to Login</span>
        </a>
    </div>

    <div class="mt-10">
        <h1 class="text-3xl font-[600] text-gray-900">Verify code</h1>
        <p class="text-base font-[400] text-gray-500 mt-4 max-w-md">
            An authentication code has been sent to your email 
            @if(request('email'))
                <span class="font-semibold text-gray-800">({{ request('email') }})</span>
            @endif
        </p>
    </div>

    <form action="{{ route('verify_code.post') }}" method="POST" class="mt-12 max-w-lg">
        @csrf
        <input type="hidden" name="email" value="{{ request('email') }}">

        @if($errors->any())
            <div class="mb-4 text-red-500 text-sm font-medium">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('success'))
            <div class="mb-4 text-green-600 text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        <div class="relative border-b-2 border-gray-200 focus-within:border-[#FF8D28] py-2 transition-all">
            <label for="otpCode" class="block text-xs font-medium text-gray-400 uppercase tracking-wider">Enter code</label>
            <input 
                type="text" 
                id="otpCode" 
                name="otpCode" 
                class="block w-full border-0 p-0 text-gray-900 outline-none text-xl tracking-[0.5em] font-bold placeholder-gray-300" 
                placeholder="000000"
                required
            >
        </div>

        <div class="mt-4">
            <p class="text-start font-[500] text-sm text-gray-600">
                Didn’t receive a code? 
                <button 
                    form="resend-form" 
                    type="submit" 
                    class="font-[500] hover:underline text-[#FF8D28] cursor-pointer"
                >
                    Resend
                </button>
            </p>
        </div>

        <button 
            type="submit" 
            class="mt-10 h-[45px] w-full bg-[#FF8D28] hover:bg-[#FBA81F] text-white font-semibold rounded-sm transition-all"
        >
            Verify
        </button>
    </form>

    {{-- Form terpisah untuk Resend agar tidak tabrakan dengan form utama --}}
    <form id="resend-form" action="{{ route('resend_otp') }}" method="POST" class="hidden">
        @csrf
        <input type="hidden" name="email" value="{{ request('email') }}">
    </form>
@endsection