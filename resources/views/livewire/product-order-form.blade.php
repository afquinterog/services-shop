<div class="responsive-container overflow-hidden relative">
    <div class="text-gray-400 mb-8">
        <span>Por favor ingresa la siguiente información para completar el pedido</span>
    </div>
    <form wire:submit.prevent="createOrder" class="grid grid-cols-1 gap-y-6 sm:grid-cols-1 sm:gap-x-8">
        <div>
            <label for="name" class="text-sm font-medium text-white">Nombre</label>
            <div class="mt-1 mb-4">
                <input type="text" name="name" id="name" wire:model="order.name"
                       class="text-black py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">

                @error('order.name')
                <div class="pt-4 text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <label for="phone" class="text-sm font-medium text-white">Telefono</label>
            <div class="mt-1 mb-4">
                <input type="number" name="phone" id="phone" wire:model="order.phone"
                       class="text-black py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">

                @error('order.phone')
                <div class="pt-4 text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <label for="quantity" class="text-sm font-medium text-white">Cantidad</label>
            <div class="mt-1 mb-4">
                <input type="number" name="quantity" id="quantity" wire:model="order.quantity"
                       class="text-black py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">

                @error('order.quantity')
                <div class="pt-4 text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-12 flex">

                <button type="submit" wire:loading.attr="disabled"
                        class="flex items-center mr-8 bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                    <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="ml-2">Enviar</span>
                </button>

                <div>
                    <span wire:loading>Enviando los datos...</span>
                    @if ($orderSent)
                        <span>Hemos recibido tu pedido, nuestro equipo de servicio al cliente te contactará pronto.</span>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>


