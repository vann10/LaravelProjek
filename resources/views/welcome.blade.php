<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="relative h-screen overflow-hidden bg-dark-primary flex">
        <div class="hidden md:block md:w-1/2 bg-dark-secondary">
            <img src="https://images.pexels.com/photos/47344/dollar-currency-money-us-dollar-47344.jpeg?_gl=1*xtiii2*_ga*NDc3MzExMjA0LjE3NDIyODc3OTM.*_ga_8JE65Q40S6*czE3NTA0MjEwMTgkbzgkZzEkdDE3NTA0MjI0NjEkajU5JGwwJGgw"
                 alt="Workspace"
                 class="w-full h-full object-cover">
            </div>

        <div class="w-full md:w-1/2 flex items-center justify-center p-8 lg:p-12">
            <div class="w-full max-w-md mx-auto">
                <div class="text-center mb-10">
                    <x-application-logo class="w-20 h-20 mx-auto fill-current text-accent-gold" />
                    <h1 class="mt-6 text-3xl font-bold tracking-tight text-text-light">
                        Selamat Datang Kembali
                    </h1>
                    <p class="mt-2 text-sm text-text-dark">
                        Kelola keuangan Anda dengan mudah dan modern.
                    </p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-text-medium">Email</label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                       class="block w-full bg-dark-primary border-dark-tertiary rounded-md shadow-sm focus:border-accent-blue focus:ring-accent-blue text-text-light"
                                       :value="old('email')">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm font-medium text-text-medium">Password</label>
                                @if (Route::has('password.request'))
                                    <div class="text-sm">
                                        <a href="{{ route('password.request') }}" class="font-medium text-accent-blue hover:text-accent-blue-hover">
                                            Lupa password?
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" autocomplete="current-password" required
                                       class="block w-full bg-dark-primary border-dark-tertiary rounded-md shadow-sm focus:border-accent-blue focus:ring-accent-blue text-text-light">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-accent-blue hover:bg-accent-blue-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-dark-primary focus:ring-accent-gold transition duration-150 ease-in-out">
                                Log In
                            </button>
                        </div>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-text-dark">
                    Belum memiliki akun?
                    <a href="{{ route('register') }}" class="font-semibold leading-6 text-accent-blue hover:text-accent-blue-hover">
                        Daftar disini
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>