@inject('styles', 'App\Services\Style')

<x-web-layout class="{{ $styles->getBackground() }} {{ $styles->getText() }}">

{{--    @include('partials.marketing.header')--}}
    @section('title', $pageTitle)
    @section('metaDescription', $metaDescription)

    @section('content')
        <div class="container mx-auto px-4">
            @forelse ($categories as $category)
                <x-category-list :category="$category"></x-category-list>
            @empty

            @endforelse
        </div>
    @endsection
    @include('partials.marketing.footer')
</x-web-layout>
