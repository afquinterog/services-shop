
<x-slot name="header">
    <div class="flex flex-row justify-between">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Products Management') }}
            </h2>
        </div>
        <div x-data>
            <button @click="$dispatch('new-product', {})"  type="button"
                    class="py-2 px-4 border bg-indigo-600 hover:bg-indigo-700 rounded-md shadow-sm text-sm font-medium text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('New Product') }}
            </button>
        </div>
    </div>

</x-slot>


<div class="py-12" x-data @new-product.window="$wire.select()">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                            @if (!$isEditing)
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ __('Name') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ __('Price') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ __('Category') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ __('Slug') }}
                                            </th>

                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">{{ __('Edit') }}</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                        @forelse ($products as $product)
                                            @php
                                                $productView = new \App\ViewModels\ProductView($product);
                                            @endphp
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $product->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $productView->getFormattedPrice() }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $product->categories->first()->name ?? 'No asociado a una categoría' }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $product->slug }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a wire:click="select({{ $product->id }})" href="javascript:void(0);" class="text-indigo-600 hover:text-indigo-900">
                                                        {{ __('Editar')}}
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse


                                        </tbody>
                                    </table>
                                </div>
                            @endif

                            @if ($isEditing)
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
                                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white mt-4">
                                    <div class="p-4">
                                        <form class="space-y-8 divide-y divide-gray-200">
                                            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                                                <div>
                                                    <div>
                                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                            {{ __('Product Images') }}
                                                        </h3>
                                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                                            {{ __('Add images to your product, first one will be used as the main product image.')}}
                                                        </p>
                                                    </div>

                                                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">

                                                        <ul class="mx-auto grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-4 md:gap-x-6 lg:max-w-5xl lg:gap-x-8 lg:gap-y-12 xl:grid-cols-6">


                                                            @forelse ($product->images as $image)
                                                                <li>
                                                                    <div class="space-y-4">
                                                                        <img class="mx-auto h-20 w-20 rounded-l lg:w-24 lg:h-24"
                                                                             src="{{ Storage::disk('s3')->temporaryUrl($image->route, now()->addMinutes(5))}}"
                                                                             alt="">
                                                                        <div class="space-y-2">
                                                                            <div class="text-xs font-medium lg:text-sm text-center">
                                                                                <a href="javascript:void(0);" wire:click="deletePhoto({{$image->id}})" class="text-indigo-600">Eliminar</a>
                                                                            </div>
                                                                            @if( $image->order >=2 )
                                                                                <div class="text-xs font-medium lg:text-sm text-center">
                                                                                    <a href="javascript:void(0);" wire:click="setMainPhoto({{$image->id}})" class="text-indigo-600">Usar en portada</a>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @empty
                                                            @endforelse

                                                        </ul>

                                                    </div>

                                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                        <label for="active" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                            {{ __('Choose a product image') }}
                                                        </label>
                                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                            <input type="file" wire:model="productImage">
                                                            @error('photo') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="pt-5">
                                                <div class="flex justify-end">

                                                    <button wire:click="savePhoto" type="button" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        {{ __('Upload Image') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endif
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


