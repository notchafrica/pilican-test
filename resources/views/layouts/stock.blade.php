<div class="flex w-full overflow-y-hidden h-screen">
    <div class="flex-none w-60 bg-white border-r overflow-visible h-screen">
        <ul class="flex flex-col space-y-2 mt-2 w-full">
            <li>
                <h2 class="px-3 font-semibold">@lang("Stock")</h2>
            </li>
            <li><a href="{{route('stocks.index')}}"
                    class="flex px-3 py-2 transition-all delay-100 items-center space-x-2 ease-in-out hover:bg-green-100
                    w-full text-green-600 rounded-md @if (Route::currentRouteName() == 'stocks.index') bg-green-100 @endif">
                    <x-icon name="view-grid" class="h-5"></x-icon> <span>@lang("Overview")</span>
                </a></li>
            <li><a href="{{route('stocks.categories')}}"
                    class="flex px-3 py-2 transition-all delay-100 items-center space-x-2 ease-in-out hover:bg-green-100
                                    w-full text-green-600 rounded-md @if (Route::currentRouteName() == 'stocks.categories') bg-green-100 @endif">
                    <x-icon name="tag" class="h-5"></x-icon> <span>@lang("Categories")</span>
                </a></li>
            <li><a href="{{route('stocks.products')}}"
                    class="flex px-3 py-2 transition-all delay-100 items-center space-x-2 ease-in-out hover:bg-green-100
                                    w-full text-green-600 rounded-md @if (Route::currentRouteName() == 'stocks.products') bg-green-100 @endif">
                    <x-icon name="color-swatch" class="h-5"></x-icon> <span>@lang("Products")</span>
                </a></li>
            <li><a href="{{route('stocks.services')}}"
                    class="flex px-3 py-2 transition-all delay-100 items-center space-x-2 ease-in-out hover:bg-green-100
                                        w-full text-green-600 rounded-md @if (Route::currentRouteName() == 'stocks.services') bg-green-100 @endif">
                    <x-icon name="briefcase" class="h-5"></x-icon> <span>@lang("Services")</span>
                </a></li>
        </ul>
    </div>
    <div class="h-screen p-3 flex-grow">
        @isset($slot)
        {{ $slot }}
        @endisset
    </div>
</div>
