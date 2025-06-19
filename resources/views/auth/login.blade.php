<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="antialiased">
    <div class="relative min-h-screen bg-dark-primary flex">
        <div class="hidden md:block md:w-1/2 bg-dark-secondary">
            <img src="https://images.pexels.com/photos/3183165/pexels-photo-3183165.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                 alt="Workspace" class="w-full h-full object-cover">
        </div>

        <div class="w-full md:w-1/2 flex items-center justify-center p-8 lg:p-12">
            <div class="w-full max-w-md mx-auto">
                <div class="text-left mb-10">
                    <a href="/" class="text-accent-gold hover:text-accent-gold-hover mb-6 inline-block">&larr; Kembali ke Beranda</a>
                    <h1 class="text-3xl font-bold tracking-tight text-text-light">Selamat Datang Kembali</h1>
                    <p class="mt-2 text-sm text-text-dark">Silakan login untuk melanjutkan.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <x-input-label for="email" value="Email" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <x-input-label for="password" value="Password" />
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-sm text-accent-blue hover:text-accent-blue-hover">Lupa password?</a>
                                @endif
                            </div>
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-primary-button class="w-full flex justify-center py-3">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>

                <p class="mt-8 text-center text-sm text-text-dark">
                    Belum memiliki akun?
                    <a href="{{ route('register') }}" class="font-semibold leading-6 text-accent-blue hover:text-accent-blue-hover">Daftar disini</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>