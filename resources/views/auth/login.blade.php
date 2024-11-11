{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif
            <x-sso-button class="ms-3">
                <a href="{{ route('sso.login') }}" class="btn btn-primary">
                    Login with SSO
                </a>
            </x-sso-button>

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/output.css') }}">

    <!-- Title -->
    <title>SMART X PLATFORMS</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/Logo/logo.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body style="background-image: url('{{ asset('assets/img/Logo/cover.jpg') }}');"
    class="bg-[url('{{ asset('assets/img/Logo/cover.jpg') }}')] bg-center bg-cover bg-no-repeat h-screen w-screen relative flex items-center">

    <div class="w-full h-full bg-black opacity-50 absolute top-0 left-0"></div>

    <div
        class="relative container mx-auto px-6 py-8 text-center justify-center flex flex-col gap-4 bg-[rgba(17,24,39,0.75)] max-w-md md:max-w-lg w-[520px] h-auto rounded-xl">

        <img class="w-full my-10" src="{{ asset('assets/img/Logo/logo-main.png') }}" style="margin-bottom: 20px;"
            alt="Logo">

        <!-- Wrapper untuk input -->
        <div class="flex flex-col gap-4 w-full h-full max-w-md mx-auto">

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input style="height: 50px;"
                    class="outline-none px-4 py-2 rounded-md h-8 w-full md:w-[70%] lg:w-[60%] max-w-[250px] mx-auto font-inter text-[11rem]"
                    type="text" placeholder="Username" name="email">
                <input style="height: 50px; margin-top: 20px"
                    class="outline-none px-4 py-2 rounded-md h-8 w-full md:w-[70%] lg:w-[60%] max-w-[250px] mx-auto font-inter text-[11rem]"
                    type="password" placeholder="Password" name="password">

                <!-- Wrapper untuk button -->
                <div class="text-md flex flex-col md:flex-row gap-4 mt-6 mx-auto w-full max-w-md items-center my-6">
                    <a href="{{ route('sso.login') }}"
                        class="bg-blue-600 hover:bg-blue-900 transition duration-300 ease-in-out w-full md:w-[70%] lg:w-[60%] max-w-[250px] text-[11px] text-white rounded-xl p-2 mx-auto flex items-center justify-center" style="height: 48px">
                            <span class="font-inter bold" style="font-size: 1rem;">Login Menggunakan SSO</span>
                        </a>
                    <button style="height: 50px;"
                        class="bg-red-600 hover:bg-red-900 transition duration-300 ease-in-out w-full md:w-[30%] lg:w-[30%] h-8 text-[11px] text-white rounded-xl p-2 mx-auto"><span
                            class="font-inter bold" style="font-size: 1rem;">Login</span></button>
                </div>
            </form>

        </div>
    </div>


</body>

</html>
