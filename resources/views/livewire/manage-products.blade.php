
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
                                @include('livewire.manage-products.list-products')
                            @endif

                            @if ($isEditing)
                                @include('livewire.manage-products.edit-product')
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


