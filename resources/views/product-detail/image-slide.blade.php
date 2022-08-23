<div class="images-container border-b border-gray-300 pb-12 mt-8" x-data="{ isImageModalVisible: false, image: ''}">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">{{ __('Image Slide') }}</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-10 mt-8">
        @foreach ($product->slideImages()->get() as $image)
            <div>
                <a @click="image = '{{ $image->linked_route }}';
                           isImageModalVisible = true;">
                    <img src="{{ $image->linked_route }}" alt="{{ $product->name }}"
                         class="hover:opacity-75 transition ease-in-out duration-150 object-cover rounded-lg object-cover h-72 w-72 cursor-pointer">
                </a>
            </div>
        @endforeach
    </div>

    <template x-if="isImageModalVisible">
        <div
            @click="isImageModalVisible = false"
            style="background-color: rgba(0, 0, 0, .5);"
            class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto bg-red-500"
        >
            <div
                class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                <div
                    class="bg-gray-900 rounded">
                    <div class="flex justify-end pr-4 pt-2">
                        <button
                            class="text-3xl leading-none hover:text-gray-100 text-gray-300"
                            @click="isImageModalVisible = false"
                            @keydown.escape.window="isImageModalVisible = false">
                            &times;
                        </button>
                    </div>
                    <div
                        class="modal-body px-8 py-8 ">
                        <img :src="image" alt="{{ $product->name }}" class="object-contain">
                    </div>
                </div>
            </div>
        </div>
    </template>

</div> <!-- end images-container -->
