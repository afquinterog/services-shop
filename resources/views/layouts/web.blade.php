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
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ session('company')->gtag ?? "" }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ session('company')->gtag ?? "" }}');
        </script>

    </head>
    <body {{ $attributes->merge(['class' => '']) }} >
        <header class="border-b border-gray-300">
            <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
                <div class="flex flex-col lg:flex-row items-center">
                    <a href="/">
                        <img src="{{ session('company')->actual_logo ?? ""  }}" alt="{{ session('company')->name }}" class="w-20 flex-none">
                    </a>
                    <ul class="flex ml-0 lg:ml-16 space-x-10 mt-6 lg:mt-0">
                        <li><a href="/" class="hover:text-gray-400">{{ __('Products') }}</a></li>
                        <li><a href="{{ route('dashboard') }}" class="hover:text-gray-400">{{ __('Admin') }}</a></li>
                    </ul>
                </div>
                <div class="flex items-center mt-6 lg:mt-0">
                    <livewire:search-dropdown/>

{{--                    <div class="ml-6">--}}
{{--                        <a href="#"><img src="/avatar2.png" alt="avatar"  class="rounded-full w-12"></a>--}}
{{--                    </div>--}}

                    <div class="text-green-500 ml-4">
                        <a href="https://wa.me/{{ session('company')->whatsapp}}"
                            target="_blank"
                            class="mx-4 hover:text-blue-600">
                                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            </a>                
                        </a>
                    </div>
                </div>
                
            </nav>

           

        </header>

        <main class="py-8">
            {{ $slot }}
            @yield('content')
        </main>

        <footer class="border-t border-gray-300">
            <div class="container mx-auto px-4 py-6 flex flex-wrap flex-col md:flex-row">

                <div class="flex-1 text-center md:text-left">
                    <a href="http://www.instagram.com/{{ session('company')->instagram  }}"
                       target="_blank"
                       class="mr-4 hover:{{ $styles->getTextLinkHoverColor() }}">
                        Instagram
                    </a>

                    <a href="https://wa.me/{{ session('company')->whatsapp}}"
                       target="_blank"
                       class="mx-4 hover:text-blue-600">
                        WhatsApp
                    </a>
                </div>

                <div class="ml-6 flex-1 text-center md:text-right mt-6 -ml-4 md:-ml-0 md:mt-0 ">
                    {{ sprintf("%s %s", now()->format('Y'), strtoupper(session('company_name'))) }}
                </div>

            </div>
        </footer>

        <livewire:scripts />
        @include('components.messages')
    </body>
</html>



