@extends('layouts.beranda')

@section('title', 'Form Masuk')

@section('content')
<div class="w-full flex flex-col items-start">
    <h1 class="font-semibold text-xl mb-4 text-gray-900">Form Masuk</h1>
    
    {{-- Header Status --}}
    @include('beranda.form.components.header_status')

    <div class="h-[25px]"></div> {{-- SizedBox substitute --}}

    {{-- Table Form Status --}}
    @include('beranda.form.components.table_status')
</div>
@endsection