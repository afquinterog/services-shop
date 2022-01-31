@inject('styles', 'App\Services\Style')

<x-marketplace-layout class="{{ $styles->getBackground() }} {{ $styles->getText() }}">

    @section('title', $pageTitle)
    @section('metaDescription', $metaDescription)

    @section('content')
        <div class="container mx-auto px-4">

            <livewire:marketplace-list />
        </div>

</x-marketplace-layout>
