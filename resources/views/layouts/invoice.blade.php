<div class="flex w-full overflow-y-hidden h-screen">
    <div class="flex-none w-60 bg-white border-r overflow-visible h-screen">
        <ul class="flex flex-col space-y-2 mt-2 w-full">
            <li>
                <h2 class="px-3 font-semibold">@lang("Invoices")</h2>
            </li>
            <li><a href="{{route('invoices.index')}}"
                    class="flex px-3 py-2 transition-all delay-100 items-center space-x-2 ease-in-out hover:bg-indigo-100
                    w-full text-indigo-600 rounded-md @if (Route::currentRouteName() == 'invoices.index') bg-indigo-100 @endif">
                    <x-icon name="archive" class="h-5"></x-icon> <span>@lang("Invoices")</span>
                </a></li>
            <li><a href="{{route('invoices.cashout')}}"
                    class="flex px-3 py-2 transition-all delay-100 items-center space-x-2 ease-in-out hover:bg-indigo-100
                                    w-full text-indigo-600 rounded-md @if (Route::currentRouteName() == 'invoices.cashout') bg-indigo-100 @endif">
                    <x-icon name="arrow-down" class="h-5"></x-icon> <span>@lang("Cash out")</span>
                </a></li>
        </ul>
    </div>
    <div class="h-screen p-3 flex-grow">
        @isset($slot)
        {{ $slot }}
        @endisset
    </div>
</div>
