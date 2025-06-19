<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="antialiased">
    <div class="relative min-h-screen bg-dark-primary flex">
        <div class="hidden md:block md:w-1/2 bg-dark-secondary">
            <img src="https://images.pexels.com/photos/3184423/pexels-photo-3184423.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" 
                 alt="Collaboration" class="w-full h-full object-cover">
                 </div>

        <div class="w-full md:w-1/2 flex items-center justify-center p-8 lg:p-12">
            <div class="w-full max-w-md mx-auto">
                <div class="text-left mb-10">
                    <a href="/" class="text-accent-gold hover:text-accent-gold-hover mb-6 inline-block">&larr; Kembali ke Beranda</a>
                    <h1 class="text-3xl font-bold tracking-tight text-text-light">Buat Akun Baru</h1>
                    <p class="mt-2 text-sm text-text-dark">Mulai kelola keuangan Anda hari ini.</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div>
                            <x-primary-button class="w-full flex justify-center py-3">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>

                 <p class="mt-8 text-center text-sm text-text-dark">
                    Sudah punya akun?
                    <a href="/" class="font-semibold leading-6 text-accent-blue hover:text-accent-blue-hover">Login disini</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>