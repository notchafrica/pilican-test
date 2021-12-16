<x-card title="Order details">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    @lang("Product")
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    @lang("Quantity")
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    @lang("Price")
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($order->products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$product->product->name}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$product->quantity}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$product->product->price}}
                                </td>
                            </tr>
                            @endforeach

                            @foreach ($order->services as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$product->service->name}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$product->quantity}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$product->service->price}}
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap" colspan="2">
                                    <div class="text-sm text-green-900 font-bold">@lang("Total")</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-primary font-bold">
                                    {{$order->amount}}
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            @if ($fees['show'])
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap" colspan="2">
                                    <div class="text-sm text-yellow-600 font-bold flex">@lang("Fees discount")</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <x-input wire:model="fees.amount" :placeholder="__('Fees discount')"></x-input>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap" colspan="2">
                                    <div class="text-sm text-green-900 font-bold">@lang("Totals")</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-primary font-bold">
                                    {{-- {{$order->amount + ($shipping['amount']??0)- ($trade['amount']??0) -
                                    ($quantity['amount']??0)
                                    - ($fees['amount']??0)}} --}}
                                    {{$amount}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="flex space-x-2 mt-4 items-center">
                                        @if (!$trade['show'])
                                        <x-button wire:click='addTrade'>@lang("Add trade discount")</x-button>
                                        @endif
                                        @if (!$quantity['show'])
                                        <x-button wire:click='addQuantity'>@lang("Add quantity discount")</x-button>
                                        @endif
                                        @if (!$fees['show'])
                                        <x-button wire:click='addFees'>@lang("Add fee")</x-button>
                                        @endif
                                        @if (!$shipping['show'])
                                        <x-button wire:click='addSipping'>@lang("Shipping")</x-button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <x-dialog id="addTrade" title="User information"
                        description="Complete your profile, give your name">
                        <x-input label="What's your name?" placeholder="your name bro" x-model="name" />
                    </x-dialog>
                </div>
            </div>
        </div>
    </div>
</x-card>
