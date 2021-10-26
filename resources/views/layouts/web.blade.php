<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

{{--        <title>{{ config('app.name', 'Laravel') }}</title>--}}

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

        <livewire:styles />
    </head>
    <body {{ $attributes->merge(['class' => '']) }} >
        <header class="border-b border-gray-800">
            <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
                <div class="flex flex-col lg:flex-row items-center">
                    <a href="/">
                        <img src="/logo.png" alt="Sammy Detalles" class="w-20 flex-none">
                    </a>
                    <ul class="flex ml-0 lg:ml-16 space-x-10 mt-6 lg:mt-0">
                        <li><a href="/" class="hover:text-gray-400">Productos</a></li>
                        <li><a href="#" class="hover:text-gray-400">Administración</a></li>
                    </ul>
                </div>
                <div class="flex items-center mt-6 lg:mt-0">
                    <livewire:search-dropdown/>

                    <div class="ml-6">
                        <a href="#"><img src="/avatar2.png" alt="avatar"  class="rounded-full w-12"></a>
                    </div>

                </div>
            </nav>
        </header>

        <main class="py-8">
            {{ $slot }}
            @yield('content')
        </main>

        <footer class="border-t border-gray-800">
            <div class="container mx-auto px-4 py-6">
                 {{ sprintf("%s %s", now()->format('Y'), strtoupper(session('company_name'))) }}
            </div>
        </footer>

        <livewire:scripts />
    </body>
</html>



