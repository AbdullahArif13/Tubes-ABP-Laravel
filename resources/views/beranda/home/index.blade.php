@extends('layouts.beranda')

@section('title', 'Home')

@section('content')
<div class="flex flex-col gap-6">
    {{-- Header Home Component --}}
    @include('beranda.home.components.header_home')

    @if($hasShelter)
        <div class="mt-2">
            @include('beranda.home.components.table_home')
        </div>
    @else
        {{-- Empty State --}}
        <div class="bg-white rounded-xl p-12 text-center border border-gray-200 mt-6 shadow-sm">
            <h3 class="text-lg font-semibold mb-2 text-gray-900">Kamu belum memiliki shelter</h3>
            <p class="text-sm text-gray-500 mb-4">Silakan buat shelter terlebih dahulu untuk mengelola hewan.</p>
        </div>
    @endif
</div>
@endsection