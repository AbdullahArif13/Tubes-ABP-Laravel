<form action="{{ route('login.post') }}" method="POST" class="flex flex-col gap-8 w-full max-w-lg">
    @csrf

    {{-- Input Email --}}
    <div class="relative border-b border-gray-300 focus-within:border-[#FF8D28] py-2 transition-all">
        <label for="email" class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold">Email</label>
        <input 
            type="email" 
            name="email" 
            id="email" 
            placeholder="example@mail.com" 
            class="block w-full border-none p-0 text-gray-900 placeholder-gray-300 focus:ring-0 text-base bg-transparent outline-none"
            required
        >
    </div>

    {{-- Input Password --}}
    <div class="relative border-b border-gray-300 focus-within:border-[#FF8D28] py-2 transition-all" x-data="{ show: false }">
        <label for="password" class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold">Password</label>
        <div class="flex items-center">
            <input 
                :type="show ? 'text' : 'password'" 
                name="password" 
                id="password" 
                placeholder="••••••••" 
                class="block w-full border-none p-0 text-gray-900 placeholder-gray-300 focus:ring-0 text-base bg-transparent outline-none"
                required
            >
            {{-- Icon mata buat show/hide password --}}
            <button type="button" @click="show = !show" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Remember Me & Forgot Password --}}
    <div class="flex items-center justify-between">
        <label class="flex items-center cursor-pointer">
            <input type="checkbox" name="remember" class="w-4 h-4 text-[#FF8D28] border-gray-300 rounded focus:ring-[#FF8D28]">
            <span class="ml-2 text-sm text-gray-600">Remember Me</span>
        </label>
        <a href="{{ route('forgot_pass') }}" class="text-sm font-semibold text-[#FF8D28] hover:text-[#E67E22]">
            Forgot Password?
        </a>
    </div>

    {{-- Button Login --}}
    <button type="submit" class="w-full h-[50px] bg-[#FF8D28] hover:bg-[#E67E22] text-white font-bold rounded-lg transition-all active:scale-[0.98] shadow-md shadow-orange-100">
        Login
    </button>

    <div class="text-center mt-2">
        <p class="text-sm text-gray-600">
            Don't have an account? 
            <a href="{{ route('register') }}" class="font-bold text-[#FF8D28] hover:underline">Sign up</a>
        </p>
    </div>
</form>