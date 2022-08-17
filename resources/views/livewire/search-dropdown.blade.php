@inject('styles', 'App\Services\Style')

<div class="relative" x-data="{isVisible: true}" @click.away="isVisible = false">
    <input
        x-ref="search"
        wire:model.debounce.300ms="search"
        type="text"
        class="{{ $styles->getSearchBarBackgroundColor() }} text-sm rounded-full px-3 py-1 w-64 pl-8 focus:outline-none focus:shadow-outline"
        placeholder="{{ __('Press / for search ...') }}"
        @focus="isVisible = true"
        @keydown="isVisible = true "
        @keydown.shift.tab="isVisible = false"
        @keydown.escape.window="isVisible = false"
        @keydown.window="
            if (event.keyCode === 191) { // User press /
                event.preventDefault();
                $refs.search.focus();
            }
        "
    >
    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg class="fill-current text-gray-400 w-4" viewBox="0 0 24 24">
            <path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/>
        </svg>
    </div>

    @if (strlen($search) >= 2)
        <div class="absolute z-50 {{ $styles->getSearchBarResultsBackgroundColor() }} text-xs rounded w-64 mt-2"
             x-show.transition.opacity.duration.300="isVisible">
            @if (count($searchResults) > 0)
                <ul>
                    @foreach ($searchResults as $product)
                        <li class="border-b border-gray-700">
                            <a href="{{ '/products/' . $product->slug}}"
                               class="block hover:bg-gray-700 flex items-center transition ease-in-out duration-150 px-3 py-3"
                               @if ($loop->last) @keydown.tab="isVisible=false" @endif
                            >
                                @if( $product->getFirstImage())
                                    <img src="{{ $product->getFirstImage() }}" alt="{{ $product->name }}" class="w-10">
                                @else
                                    <img src="https://via.placeholder.com/264x352" alt="{{ $product->name }}" class="w-10">
                                @endif

                                <span class="ml-4">{{ $product->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
    </div>
    @endif

</div>


