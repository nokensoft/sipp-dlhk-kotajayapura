<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" integrity="sha512-w7ozifyaPV5z7iYP1t1QupBme93n54u/vU25d2rP1ne+kxyW/C73JE5s1v8vZldCV7zIAqNF6iG2W/qIhlrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        <script src="https://unpkg.com/leaflet/dist/leaflet.js" integrity="sha512-cG6bE0rQhOLgR1i78v5zQkF441ztMy5v5A9HrP080g2l4n3Yd9Y81r6kYv49z0dN7z6awpEn+z6Q2vA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @livewireScripts
    </body>
</html>
