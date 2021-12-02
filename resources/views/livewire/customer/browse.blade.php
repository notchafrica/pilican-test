<div class="px-4 md:px-6">

    <div class="space-y-5 mt-5">
        <div class="border-b w-full flex justify-between items-end pb-2">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                    @lang("Customers")
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-200">
                    @lang("Get details about customer's")
                </p>
            </div>
            <div class="pb-1">
                <x-button label="{{__('Create new customer')}}" wire:click="$emit('openModal', 'customer.create')"
                    primary />
            </div>
        </div>
        @if ($customers->isNotEmpty())
        <ul class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-5">
            @foreach ($customers as $customer)
            <li class="border-gray-400 flex flex-row mb-2">
                <a href="{{route('customers.show', $customer->code)}}"
                    class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md flex flex-1 items-center p-4">
                    <div class="flex flex-col w-10 h-10 justify-center items-center mr-4">
                        <div class="block relative">
                            <img alt="profil" src="{{ $customer->getUrlfriendlyAvatar() }}"
                                class="mx-auto object-cover rounded-full h-10 w-10 " />
                        </div>
                    </div>
                    <div class="flex-1 pl-1 md:mr-16 space-y-1">
                        <div class="font-medium dark:text-white">
                            {{$customer->name}}
                        </div>
                        <div class="text-gray-600 dark:text-gray-200 text-sm flex space-x-4">
                            <span
                                class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-green-600 bg-green-50 rounded-md">@lang("Balance"):
                                {{$customer->balance}}</span>
                            <span
                                class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-blue-600 bg-blue-50 rounded-md">@lang("Operations"):
                                {{$customer->operations??0}}</span>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        @else
        <div class="h-full items-center">
            <p class="text-center text-gray-500">
                @lang("No customers found")
            </p>
        </div>
        @endif

    </div>
</div>
