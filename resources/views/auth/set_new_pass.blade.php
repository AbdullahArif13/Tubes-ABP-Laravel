<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Password - Travelwise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-row bg-white">

    <div class="relative flex flex-col justify-start w-full lg:w-3/5 px-12 pt-20">
        <div class="absolute top-8 left-8">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="175">
        </div>

        <div class="mt-20">
            <h1 class="text-3xl font-[600] text-gray-900">Set a password</h1>
            <p class="text-base font-[400] text-gray-500 mt-4 max-w-md">
                Your previous password has been reset. Please set a new password for your account.
            </p>
        </div>

        <form action="{{ route('set_new_pass.post') }}" method="POST" class="mt-12 max-w-lg">
            @csrf
            {{-- Email dikirim sebagai hidden field, diambil dari query param --}}
            <input type="hidden" name="email" value="{{ request('email') }}">

            @if($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-600 rounded-sm text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="space-y-6">
                <div class="relative border-b-2 border-gray-200 focus-within:border-[#FF8D28] py-2 transition-all">
                    <label for="password" class="block text-xs font-medium text-gray-400 uppercase tracking-wider">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="block w-full border-0 p-0 text-gray-900 outline-none placeholder-gray-300 focus:ring-0 sm:text-sm" 
                        placeholder="••••••••"
                        required
                    >
                </div>

                <div class="relative border-b-2 border-gray-200 focus-within:border-[#FF8D28] py-2 transition-all">
                    <label for="confirmPass" class="block text-xs font-medium text-gray-400 uppercase tracking-wider">Confirm Password</label>
                    <input 
                        type="password" 
                        id="confirmPass" 
                        name="confirmPass" 
                        class="block w-full border-0 p-0 text-gray-900 outline-none placeholder-gray-300 focus:ring-0 sm:text-sm" 
                        placeholder="••••••••"
                        required
                    >
                </div>
            </div>

            <button 
                type="submit" 
                class="mt-10 h-[45px] w-full bg-[#FF8D28] hover:bg-[#FBA81F] text-white font-semibold rounded-sm transition-all duration-200"
            >
                Set password
            </button>
        </form>
    </div>

    <div class="hidden lg:flex justify-center items-center w-2/5 px-4 bg-gray-50">
        <img 
            src="{{ asset('assets/images/set_pass_mockup.png') }}" 
            alt="setPassMock" 
            class="rounded-2xl shadow-xl object-cover w-[425px]"
        >
    </div>

</body>
</html>