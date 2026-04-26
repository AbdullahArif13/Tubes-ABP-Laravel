<form action="{{ route('register.post') }}" method="POST">
    @csrf

    {{-- Error Handling --}}
    @if($errors->any())
        <div class="mb-4 text-red-500 text-sm font-medium">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- Row 1: First Name & Last Name --}}
    <div class="flex flex-row gap-4">
        <div class="flex-1 border-b-2 border-gray-200 focus-within:border-[#FF8D28] py-2 transition-all">
            <label class="block text-xs font-medium text-gray-400 uppercase">First Name</label>
            <input type="text" name="firstName" value="{{ old('firstName') }}" class="w-full border-0 p-0 outline-none text-sm" required>
        </div>
        <div class="flex-1 border-b-2 border-gray-200 focus-within:border-[#FF8D28] py-2 transition-all">
            <label class="block text-xs font-medium text-gray-400 uppercase">Last Name</label>
            <input type="text" name="lastName" value="{{ old('lastName') }}" class="w-full border-0 p-0 outline-none text-sm" required>
        </div>
    </div>

    {{-- Row 2: Email & Phone --}}
    <div class="flex flex-row gap-4 mt-4">
        <div class="flex-1 border-b-2 border-gray-200 focus-within:border-[#FF8D28] py-2 transition-all">
            <label class="block text-xs font-medium text-gray-400 uppercase">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border-0 p-0 outline-none text-sm" required>
        </div>
        <div class="flex-1 border-b-2 border-gray-200 focus-within:border-[#FF8D28] py-2 transition-all">
            <label class="block text-xs font-medium text-gray-400 uppercase">Phone Number</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border-0 p-0 outline-none text-sm" required>
        </div>
    </div>

    {{-- Password --}}
    <div class="mt-4 border-b-2 border-gray-200 focus-within:border-[#FF8D28] py-2 transition-all">
        <label class="block text-xs font-medium text-gray-400 uppercase">Password</label>
        <input type="password" name="password" class="w-full border-0 p-0 outline-none text-sm" placeholder="••••••••" required>
    </div>

    {{-- Confirm Password --}}
    <div class="mt-4 border-b-2 border-gray-200 focus-within:border-[#FF8D28] py-2 transition-all">
        <label class="block text-xs font-medium text-gray-400 uppercase">Confirm Password</label>
        <input type="password" name="confirmPass" class="w-full border-0 p-0 outline-none text-sm" placeholder="••••••••" required>
    </div>

    {{-- Checkbox Terms --}}
    <div class="mt-6 flex items-center gap-3">
        <input type="checkbox" name="agree" id="agreeTerms" class="w-4 h-4 accent-[#FF8D28] cursor-pointer" required>
        <label for="agreeTerms" class="text-sm font-[500]">
            I agree to <a href="/terms" class="text-[#FF8D28] hover:underline">Terms</a> and <a href="/privacy" class="text-[#FF8D28] hover:underline">Privacy Policies</a>
        </label>
    </div>

    <button type="submit" class="mt-8 h-[45px] w-full bg-[#FF8D28] hover:bg-[#FBA81F] text-white font-semibold rounded-sm transition-all duration-200">
        Create account
    </button>

    <p class="text-center font-[500] text-sm mt-4">
        Already have an account? 
        <a href="{{ route('login') }}" class="text-[#FF8D28] hover:underline">Login</a>
    </p>
</form>