<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
    <div class="p-4">
        <form class="space-y-8 divide-y divide-gray-200">
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ __('Edit Product')}}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            {{ __('Product Information')}}
                        </p>
                    </div>

                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                {{ __('Name')}}
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input wire:model="product.name" type="text" name="name" id="name" autocomplete="given-name" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                {{ __('Description')}}
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <textarea wire:model="product.description" id="description" name="description" rows="10" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
                                <p class="mt-2 text-sm text-gray-500">
                                    {{ __('Please write a product description')}}
                                </p>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="price" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                {{ __('Price')}}
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input wire:model="product.price" type="text" name="price" id="price" autocomplete="given-name" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                {{ __('Category')}}
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <select wire:model="categoryId" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                    <option value="">Selecciona una categoría</option>
                                    @foreach ($categories as $category)
                                        <option
                                            value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="active" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                {{ __('Publish')}}
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <select wire:model="product.active" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                    <option value="">Selecciona una opción</option>
                                    <option value="1">{{ __('Yes') }}</option>
                                    <option value="0">{{ __('No') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="price" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                {{ __('Order') }}
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input wire:model="product.order" type="text" name="order" id="order" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                <p class="mt-2 text-sm text-gray-500">
                                    {{ __('Order should be a number and indicate the product position in the category')}}
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button wire:click="showEditForm(false);" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Cancel')}}
                    </button>
                    <button wire:click="update();" type="button" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Save')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@if ($product->id)
    @include('livewire.manage-products.edit-product-image-list')

    @include('livewire.manage-products.edit-product-rating-list')
@endif
