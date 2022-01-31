@inject('styles', 'App\Services\Style')

<h2 class="{{ $styles->getCategoryTitleColor() }} uppercase tracking-wide font-semibold">{{ $category->name }}</h2>
<div class="produc-list text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12  pb-16">
    @foreach ($category->products as $product)
        <x-product-preview :product="$product" ></x-product-preview>
    @endforeach
</div>
