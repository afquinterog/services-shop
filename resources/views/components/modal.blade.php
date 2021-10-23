{{--<div--}}

{{--    style="background-color: rgba(0, 0, 0, .5);"--}}
{{--    class="productModal z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">--}}
{{--    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">--}}
{{--        <div class="bg-gray-900 rounded">--}}
{{--            <div class="flex justify-end pr-4 pt-2">--}}
{{--                <button class="text-3xl leading-none hover:text-gray-300">--}}
{{--                    &times;--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        Sample data--}}
{{--    </div>--}}
{{--</div>--}}


<div
    x-data="{name: {{ $name }}, openModal: false}"
    x-show="openModal"
    x-cloak
    @open-modal.window="console.log($event.detail); openModal=true"
    style="background-color: rgba(0, 0, 0, .5);"
    class="productModal z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
    <div class="container mx-auto lg:px-64 rounded-lg overflow-y-auto">
        <div class="bg-gray-900 rounded" @click.away="openModal = false">
            <div class="flex justify-end pr-4 pt-2">
                <button class="text-3xl leading-none hover:text-gray-300" @click="openModal = false">
                    &times;
                </button>
            </div>
            <div class="modal-body px-8 py-8">
                {{ $content }}
            </div>
        </div>
    </div>
</div>
