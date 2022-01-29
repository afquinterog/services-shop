<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white mt-4">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ __('Rating') }}
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ __('Message') }}
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ __('Date') }}
            </th>

            <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">{{ __('Approve') }}</span>
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">

        @forelse ($product->ratings()->get() as $rating)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    
                    <x-rating :rate="$rating->rating" />
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $rating->message }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $rating->created_at }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a wire:click="select({{ $rating->id }})" href="javascript:void(0);" class="text-indigo-600 hover:text-indigo-900">
                        {{ __('Approve')}}
                    </a>
                </td>
            </tr>
        @empty
            <tr><td>
            {{ __("No rating information for the actual product") }}
                </td></tr>
        @endforelse


        </tbody>
    </table>
</div>
