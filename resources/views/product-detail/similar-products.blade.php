<div class="similar-products-container mt-8">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">{{ __('Similar options') }}</h2>
    <div
        class="similar-products text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
        @foreach ($product->similarProducts() as $product)
            <div class="product mt-8">
                <div class="relative inline-block">
                    <a href="/my-products/{{$product->slug}}">
                        <img src="{{ $product->getFirstImage() }}" alt="{{ $product->name }}"
                             class="hover:opacity-75 transition ease-in-out duration-150 cursor-pointer">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 {{ $styles->getProductPriceCircleBackgroundColor() }} rounded-full"
                         style="right: -20px; bottom: -20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            ${{ $product->formatted_price }}
                        </div>
                    </div>
                </div>
                <a href="/my-products/{{$product->slug}}"
                   class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{ $product->name }}</a>
                <div class="text-gray-400 mt-1">{{ $product->categories_description }}</div>
            </div>
        @endforeach

    </div> <!-- end similar-products -->
</div> <!-- end similar-products-container -->
