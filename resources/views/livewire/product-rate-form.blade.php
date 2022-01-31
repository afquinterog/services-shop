<div class="responsive-container overflow-hidden relative">
    <div class="text-gray-400 mb-8">
        <span>{{ __('Please complete the following information') }}</span>
    </div>
    <form wire:submit.prevent="createRate" class="grid grid-cols-1 gap-y-6 sm:grid-cols-1 sm:gap-x-8">
        <div>
            <label for="name" class="text-sm font-medium text-white">{{ __('Rate') }}</label>
            <div class="mt-1 mb-4">
                <select wire:model="rate.rating">
                    <option value="">Select the rate</option>
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Stars</option>
                </select>

                @error('rate.rating')
                <div class="pt-4 text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <label for="message" class="text-sm font-medium text-white">{{ __('Message') }}</label>
            <div class="mt-1 mb-4">
                <textarea cols="5" name="message" id="message" wire:model="rate.message"
                          class="text-black py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"></textarea>

                @error('rate.message')
                <div class="pt-4 text-red-500">{{ $message }}</div>
                @enderror
            </div>


            <div class="mt-12 flex">

                <button type="submit" wire:loading.attr="disabled"
                        class="flex items-center mr-8 bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                    <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="ml-2">{{ __('Send') }}</span>
                </button>

                <div>
                    <span wire:loading.delay>{{ __('Sending the message ...') }}</span>
                    @if ($rateSent)
                        <span>{{ __('Rate received, thanks for help us to improve.') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
