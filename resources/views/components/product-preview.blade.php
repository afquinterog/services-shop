@inject('styles', 'App\Services\Style')

<div class="product mt-8">
    <div class="relative inline-block">
        <a href="/my-products/{{$product->slug}}">
            <img src="{{ $product->getFirstImage() }}"
                 alt="{{ $product->name }}"
                 class="hover:opacity-75 transition ease-in-out duration-150 h-64 w-64 object-cover">
        </a>
        <div class="absolute bottom-0 right-0 w-16 h-16 {{ $styles->getProductPriceCircleBackgroundColor() }}  rounded-full"
             style="right: -20px; bottom: -20px">
            <div class="font-semibold text-xs flex justify-center items-center h-full">
                ${{ $product->formatted_price }}
            </div>
        </div>
    </div>
    <a href="/products/{{$product->slug}}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{$product->name}}</a>
    {{--                            <div class="text-gray-400 mt-1">{{$product->description}}</div>--}}
</div>
