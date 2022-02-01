
<x-slot name="header">
    <div class="flex flex-row justify-between">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Configuration Management') }}
            </h2>
        </div>
    </div>
</x-slot>


<div class="py-12" x-data>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                    <div class="p-4">
                                        <form class="space-y-8 divide-y divide-gray-200">
                                            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                                                <div>
                                                    <div>
                                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                            {{ __('Shop Configuration')}}
                                                        </h3>
                                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                                            {{ __('Information to configure your shop')}}
                                                        </p>
                                                    </div>

                                                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                            <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                                {{ __('Name')}}
                                                            </label>
                                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                                <input wire:model="company.name" type="text"  autocomplete="name" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                                            </div>
                                                        </div>

                                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                            <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                                {{ __('Description')}}
                                                            </label>
                                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                                <textarea wire:model="company.description" rows="10" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
                                                                <p class="mt-2 text-sm text-gray-500">
                                                                    {{ __('Please write a description for your shop')}}
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                            <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                                {{ __('Meta Description')}}
                                                            </label>
                                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                                <textarea wire:model="company.meta_description" rows="10" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
                                                                <p class="mt-2 text-sm text-gray-500">
                                                                    {{ __('Similar to the description but this is more aimed to search engines')}}
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                            <label for="price" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                                {{ __('Theme') }}
                                                            </label>
                                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                                <select wire:model="company.theme" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                                                    <option value="">{{ __('Select the shop front page theme') }}</option>
                                                                    <option value="light">{{ __('Light') }}</option>
                                                                    <option value="dark">{{ __('Dark') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                            <label for="whatsapp" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                                {{ __('WhastApp')}}
                                                            </label>
                                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                                <input name="whatsapp" wire:model="company.whatsapp" type="text"  autocomplete="whatsapp" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                                            </div>
                                                        </div>

                                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                            <label for="instagram" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                                {{ __('Instagram')}}
                                                            </label>
                                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                                <input name="instagram" wire:model="company.instagram" type="text"  autocomplete="instagram" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                                            </div>
                                                        </div>

                                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                            <label for="active" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                                {{ __('Company Logo') }}
                                                            </label>
                                                            <div class="w-28 h-28">
                                                                <img class="object-fill" src="{{ session('company')->actual_logo ?? "" }}" />
                                                            </div>
                                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                                <input type="file" wire:model="companyLogoImage">
                                                                @error('logo') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pt-5">
                                                <div class="flex justify-end">
                                                    <button wire:click="update();" type="button" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        {{ __('Save')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
