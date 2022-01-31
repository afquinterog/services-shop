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
