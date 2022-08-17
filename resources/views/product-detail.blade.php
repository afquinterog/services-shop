@inject('styles', 'App\Services\Style')

<x-web-layout>

    {{--    @include('partials.marketing.header')--}}
    @section('title', $pageTitle)
    @section('metaDescription', $product->description)


    @section('content')

        <div class="container mx-auto px-4">
            <div
                x-data="{ openBuyModal: false, openRateModal:false}"
                class="product-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">

                <div class="flex-none">
                    <img src="{{ $product->getFirstImage() }}"
                         alt="{{$product->name}}"
                         class="object-cover h-72 rounded-lg hover:opacity-75 transition ease-in-out duration-150">
                </div>
                <div class="lg:ml-12 xl:mr-64">
                    <h2 class="font-semibold text-4xl leading-tight mt-1">{{ $product->name }}</h2>
                    <div class="text-gray-400">
                        <span>{{ $product->categories_description }}</span>
                    </div>

                    @if ($product->rating > 0)
                        <x-rating :rate="$product->rating" />
                    @endif


                    <div class="flex flex-wrap items-center mt-8">
                        <div class="flex items-center">
                            <div class="w-16 h-16 {{ $styles->getProductPriceCircleBackgroundColor() }} rounded-full">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">
                                    ${{ $product->formatted_price }}</div>
                            </div>
                        </div>
                    </div>

                    <p class="mt-12">{{ $product->description }}</p>

                    <div class="mt-12">
                        <div class="flex flex-row justify-start">
                            <div>
                                <button
                                    @click="openBuyModal = true"
                                    class="flex {{ $styles->getButtonBackgroundColor() }} text-white font-semibold px-4 py-4 w-32
                                    hover:{{ $styles->getButtonBackgroundHoverColor() }} rounded transition ease-in-out duration-150">
                                    <svg class="h-6 w-6 fill-current"  viewBox="0 0 24 24">
                                        <path d="M3 1a1 1 0 0 0 0 2h1.22l.305 1.222a.997.997 0 0 0 .01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 0 0 0-2H6.414l1-1H14a1 1 0 0 0 .894-.553l3-6A1 1 0 0 0 17 3H6.28l-.31-1.243A1 1 0 0 0 5 1H3zm13 15.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM6.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    </svg>
                                    <span class="ml-2">{{ __('Buy') }}</span>
                                </button>
                            </div>

                            {{-- <div class="ml-4">
                                <button
                                    @click="openRateModal = true"
                                    class="flex {{ $styles->getButtonBackgroundColor() }} text-white font-semibold px-4 py-4 w-32
                                    hover:{{ $styles->getButtonBackgroundHoverColor() }} rounded transition ease-in-out duration-150">
                                    <svg class="h-6 w-6 fill-current"  viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M5 3a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5zm9 4a1 1 0 1 0-2 0v6a1 1 0 1 0 2 0V7zm-3 2a1 1 0 1 0-2 0v4a1 1 0 1 0 2 0V9zm-3 3a1 1 0 1 0-2 0v1a1 1 0 1 0 2 0v-1z" clip-rule="evenodd"/>
                                    </svg>

                                    <span class="ml-2">{{ __('Rate') }}</span>
                                </button>
                            </div> --}}
                        </div>

                    </div>
                </div>

                @include('product-detail.buy-modal')
                @include('product-detail.rate-modal')

            </div> <!-- end product details -->

            @if ( $product->images()->count() >= 2)
                @include('product-detail.image-slide')
            @endif

            @if($product->similarProducts()->count() >= 1)
                @include('product-detail.similar-products')
            @endif


        </div>
    @endsection

    @include('partials.marketing.footer')
</x-web-layout>
