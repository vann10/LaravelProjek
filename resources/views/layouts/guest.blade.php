<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-text-medium antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-dark-primary">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-accent-gold" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-dark-secondary shadow-2xl overflow-hidden sm:rounded-2xl border border-dark-tertiary">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>