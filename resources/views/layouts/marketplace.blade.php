@inject('styles', 'App\Services\Style')

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('metaDescription')">
    <meta name="og:title" property="og:title" content="@yield('title')">
    <meta name="twitter:card" content="@yield('title')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--        <title>{{ config('app.name', 'Laravel') }}</title>--}}

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <livewire:styles />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ "" }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ "" }}');
    </script>

</head>
<body {{ $attributes->merge(['class' => '']) }} >
<header class="border-b border-gray-800">
    <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
        <div class="flex flex-col lg:flex-row items-center">
            <a href="/">
                <img src="https://seeklogo.com/images/F/facebook-marketplace-logo-46A976DABC-seeklogo.com.png"
                     alt="Marketplace logo" class="w-20 flex-none">
            </a>
            <ul class="flex ml-0 lg:ml-16 space-x-10 mt-6 lg:mt-0">

            </ul>
        </div>
        <div class="flex items-center mt-6 lg:mt-0">
{{--            <livewire:search-dropdown/>--}}

            {{--                    <div class="ml-6">--}}
            {{--                        <a href="#"><img src="/avatar2.png" alt="avatar"  class="rounded-full w-12"></a>--}}
            {{--                    </div>--}}

        </div>
    </nav>
</header>

<main class="py-8">
    {{ $slot }}
    @yield('content')
</main>

<footer class="border-t border-gray-800">
    <div class="container mx-auto px-4 py-6 flex flex-wrap flex-col md:flex-row">

        <div class="flex-1 text-center md:text-left">
            <a href="/join"
               class="mr-4 hover:{{ $styles->getTextLinkHoverColor() }}">
                Do you want to sell your product here?
            </a>

        </div>

        <div class="ml-6 flex-1 text-center md:text-right mt-6 -ml-4 md:-ml-0 md:mt-0 ">
            {{ sprintf("%s %s", now()->format('Y'), "MarketPlace") }}
        </div>

    </div>
</footer>

<livewire:scripts />
@include('components.messages')
</body>
</html>



