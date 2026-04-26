<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Travelwise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-row bg-white">

    <div class="hidden lg:flex justify-center items-center w-2/5 px-4 bg-gray-50">
        <img 
            src="{{ asset('assets/images/register_mockup.png') }}" 
            alt="registerMock" 
            class="rounded-2xl shadow-xl object-cover w-[425px]"
        >
    </div>

    <div class="relative flex flex-col justify-center w-full lg:w-3/5 px-12 pt-10">
        <div class="absolute top-8 right-8">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="175">
        </div>

        <div>
            <h1 class="text-3xl font-[600] text-gray-900">Sign up</h1>
            <p class="text-base font-[400] text-gray-700 mt-4">
                Let’s get you all set up so you can access your personal account.
            </p>
        </div>

        <div class="mt-8">
            @include('auth.components.form_register')
        </div>

        <div class="mt-8">
            @include('auth.components.social_register')
        </div>
    </div>

</body>
</html>