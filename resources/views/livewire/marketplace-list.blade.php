<div>
    <div class="mt-4 mb-4">

        <div class="flex flex-row">
            <input type="text" name="search" id="search"
                   wire:model="search"
                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-60 sm:text-sm border-gray-300 rounded-md"
                   autocomplete="off"
                   placeholder="{{ __('Search ...') }}">

            <select id="category" name="category"
                    autocomplete="off"
                    wire:model="actualCategory"
                    class="max-w-lg block ml-2 focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                <option value="">{{ __('Select a category ...') }}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name  }}</option>
                @endforeach
            </select>

            <select id="vendor" name="vendor"
                    autocomplete="off"
                    wire:model="actualVendor"
                    class="max-w-lg block ml-2 focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                <option value="">{{ __('Select a vendor ...') }}</option>
                @foreach($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->name  }}</option>
                @endforeach
            </select>

            <select id="order" name="order"
                    autocomplete="off"
                    wire:model="order"
                    class="max-w-lg block ml-8 focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                <option>Order by</option>
                <option value="products.name">{{ __('Name') }}</option>
                <option value="products.price">{{ __('Price') }}</option>
            </select>

        </div>



    </div>

    <div class="produc-list text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12  pb-16">
        @foreach ($products as $product)
            <x-marketplace-product-preview :product="$product" ></x-marketplace-product-preview>
        @endforeach
    </div>

    {{ $products->links() }}
</div>
