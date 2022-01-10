<div class="w-full flex px-2 overflow-y-hidden h-screen">
    <div class="flex-none h-screen w-72 pt-4 border-r px-2">
        <div class="shadow rounded-md p-3 bg-white">
            <div class="flex flex-col justify-center space-y-2">
                <img alt="profil" src="{{ $customer->getUrlfriendlyAvatar() }}"
                    class="object-cover rounded-full h-20 w-20 mx-auto" />
                <div>
                    <h2 class="text-xl text-center font-semibold">{{$customer->name}}</h2>
                </div>
                <div>
                    <h3 class="text-center">@lang("Balance"): <span
                            class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-600 bg-indigo-50 rounded-md">
                            {{$customer->balance}}</span></h3>
                </div>
            </div>
        </div>
        <div class="px-2 w-full mt-4 space-y-2">
            <h2 class="border-b pb-2">@lang("Customer")</h2>
            <h3>@lang("Operations")</h3>
            <ul class="flex flex-col space-y-2 mt-2">
                <li><button
                        wire:click="$emit('openModal', 'customer.actions.add-credit', {{json_encode(['customer' => $customer->id])}})"
                        class="flex px-3 py-2 transition-all delay-100 items-center space-x-2 ease-in-out hover:bg-indigo-100 w-full text-indigo-600 rounded-md">
                        <x-icon name="credit-card" class="h-5"></x-icon> <span>@lang("Add
                            credit")</span>
                    </button></li>
                <li><button
                        wire:click="$emit('openModal', 'customer.edit', {{json_encode(['customer' => $customer->id])}})"
                        class="flex px-3 py-2 transition-all delay-100 items-center space-x-2 ease-in-out hover:bg-indigo-100 w-full text-indigo-600 rounded-md">
                        <x-icon name="pencil-alt" class="h-5"></x-icon> <span>@lang("Edit account")</span>
                    </button></li>
            </ul>
        </div>
    </div>
    <div class="flex-grow overflow-y-auto px-4 pt-4 space-y-2">
        @if ($transactions->count() > 0)
        <h1>@lang("Last operations")</h1>
        @foreach ($transactions as $transaction)
        <div class="flex flex-col space-y-2 bg-white px-3 py-1.5 rounded-md border">
            <div class="flex items-center justify-between">
                <div
                    class="flex items-center @if($transaction->type == 'credit') text-indigo-600 @else text-red-600 @endif">
                    <x-icon name="credit-card" class="h-5"></x-icon>
                    <span class="ml-2">{{$transaction->type}}</span>
                </div>
                <span class="text-sm text-gray-600">{{$transaction->created_at->format('d/m/Y H:i')}}</span>
            </div>
            <div class="flex items-center">
                <span class="text-sm text-gray-600">@lang("Amount")</span>
                <span class="ml-2">{{$transaction->amount}}</span>
            </div>
            <div class="flex items-center">
                <span class="text-sm text-gray-600">@lang("Description")</span>
                <span class="ml-2">{{$transaction->reason}}</span>
            </div>
        </div>

        {{$transactions->links()}}

        @endforeach
        @else

        <div class="w-full">@lang("No data available")</div>
        @endif
    </div>
</div>