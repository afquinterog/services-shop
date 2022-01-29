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
