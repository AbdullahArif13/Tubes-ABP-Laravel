@extends('layouts.auth', ['mockup' => 'forgot_pass_mockup.png'])

@section('title', 'Forgot Password')

@section('content')
    <div class="mt-10">
        <a href="{{ route('login') }}" class="flex flex-row items-center cursor-pointer group">
            <img src="{{ asset('assets/icons/back.svg') }}" alt="backIcon" class="w-5 h-5 transition-transform group-hover:-translate-x-1">
            <span class="ml-2 text-sm font-medium text-gray-700">Back to Login</span>
        </a>
    </div>

    <div class="mt-10">
        <h1 class="text-3xl font-semibold text-gray-900">Forgot your password?</h1>
        <p class="text-base font-normal mt-4 text-gray-500 max-w-md">
            Don’t worry, happens to all of us. Enter your email below to recover your password
        </p>
    </div>

    <form action="{{ route('forgot_pass.post') }}" method="POST" class="mt-12 max-w-lg">
        @csrf
        
        @if($errors->any())
            <div class="mb-4 text-red-500 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="relative border-b-2 border-gray-200 focus-within:border-[#FF8D28] py-2 transition-all">
            <label for="email" class="block text-xs font-medium text-gray-400 uppercase tracking-wider">Email</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                class="block w-full border-0 p-0 text-gray-900 placeholder-gray-300 focus:ring-0 sm:text-sm outline-none" 
                placeholder="example@mail.com"
                required
            >
        </div>

        <button 
            type="submit" 
            class="mt-10 h-[45px] w-full bg-[#FF8D28] hover:bg-[#FBA81F] text-white font-semibold rounded-sm transition-all duration-200"
        >
            Submit
        </button>
    </form>

    <div class="mt-12 max-w-lg">
        @include('auth.components.social_login')
    </div>
@endsection