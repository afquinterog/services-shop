<div
    x-show="openRateModal"
    style="background-color: rgba(0, 0, 0, .5); display: none"
    class="productRateModal z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
    <div class="container mx-auto lg:px-64 rounded-lg overflow-y-auto">
        <div class="{{ $styles->getModalBackgroundColor() }} rounded"
             @click.away="openRateModal = false">
            <div class="flex justify-end pr-4 pt-2">
                <button class="text-3xl leading-none hover:text-gray-100 text-gray-300"
                        @click="openRateModal = false">
                    &times;
                </button>
            </div>
            <div class="modal-body px-8 py-8">
                <livewire:product-rate-form :product="$product"/>
            </div>
        </div>
    </div>
</div>
