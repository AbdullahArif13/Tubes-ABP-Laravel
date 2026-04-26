@extends('layouts.auth', ['mockup' => 'login_mockup.png'])

@section('title', 'Login')

@section('content')
    <div class="mt-10">
        <h1 class="text-3xl font-semibold text-gray-900">Login</h1>
        <p class="text-base font-normal mt-4 text-gray-500">
            Login to access your travelwise account
        </p>
    </div>

    <div class="mt-8">
        {{-- Memanggil komponen Form Login --}}
        @include('auth.components.form_login')
    </div>

    <div class="mt-8">
        {{-- Memanggil komponen Social Login --}}
        @include('auth.components.social_login')
    </div>
@endsection