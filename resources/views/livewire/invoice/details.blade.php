<x-card title="Order details">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg space-y-3">
                    <x-errors />
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
                                    <div class="text-sm text-indigo-900 font-bold">@lang("Total")</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-primary font-bold">
                                    {{$order->amount}}
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="pt-4">
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-primary font-bold">
                                    <x-toggle id="tax" name="tax" wire:model="tax" :label="__('Include tax')">
                                    </x-toggle>
                                </td>
                            </tr>
                            @if ($shipping['show'])
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap" colspan="2">
                                    <div class="text-sm text-yellow-600 font-bold flex">@lang("Shipping")</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <x-input wire:model="shipping_amount" :placeholder="__('Shipping')" class="w-28">
                                    </x-input>
                                </td>
                            </tr>
                            @endif
                            @if ($trade['show'])
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap" colspan="2">
                                    <div class="text-sm text-yellow-600 font-bold flex">@lang("Trade discount")</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <x-input wire:model="trade_amount" :placeholder="__('Trade discount')" class="w-28">
                                    </x-input>
                                </td>
                            </tr>
                            @endif
                            @if ($quantity['show'])
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap" colspan="2">
                                    <div class="text-sm text-yellow-600 font-bold flex">@lang("Quantity discount")</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <x-input wire:model="quantity_amount" :placeholder="__('Quantity discount')"
                                        class="w-28">
                                    </x-input>
                                </td>
                            </tr>
                            @endif


                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap" colspan="2">
                                    <div class="text-sm text-indigo-900 font-bold">@lang("Totals HT")</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-primary font-bold" wire:poll.500ms>
                                    {{ceil($amount - ((int) $quantity_amount??0) - ((int) $trade_amount??0) + ((int)
                                    $shipping_amount??0))}}
                                </td>
                            </tr>

                            @if ($tax)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap" colspan="2">
                                    <div class="text-sm text-indigo-900 font-bold">@lang("Totals TTC")</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-primary font-bold" wire:poll.500ms>
                                    {{ ceil(($amount - ((int) $quantity_amount??0) - ((int) $trade_amount??0) + ((int)
                                    $shipping_amount??0)) + (($amount - ((int) $quantity_amount??0) - ((int)
                                    $trade_amount??0) + ((int)
                                    $shipping_amount??0)) / 100 *19.25))}}
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td colspan="3">
                                    <div class="flex space-x-2 mt-4 items-center">
                                        @if (!$trade['show'])
                                        <x-button wire:click='addTrade'>@lang("Add trade discount")</x-button>
                                        @endif
                                        @if (!$quantity['show'])
                                        <x-button wire:click='addQuantity'>@lang("Add quantity discount")</x-button>
                                        @endif
                                        @if (!$shipping['show'])
                                        <x-button wire:click='addShipping'>@lang("Shipping")</x-button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="p-4 space-y-3">
                        <div class="my-2 space-y-2">
                            <div>
                                <label>@lang("Payment method")</label>
                                <div class="flex space-x-2 mt-2">
                                    <x-radio id="cash" value="cash" label="{{__('Cash')}}" wire:model="method" />
                                    {{--
                                    <x-radio id="digital" value="digital" label="{{__('Digital payment')}}"
                                        wire:model="method" /> --}}
                                    <x-radio id="account" value="account" label="{{__('Account credit')}}"
                                        wire:model="method" />
                                </div>
                            </div>
                            <div>
                                <label>@lang("Customer")</label>
                                <div class="grid grid-cols-3 gap-6">
                                    <x-radio :label="__('Inconito')" value='inconito' wire:model='existing'
                                        id="inconito"></x-radio>
                                    <x-radio :label="__('New')" value='new' wire:model='existing' id="new"></x-radio>
                                    <x-radio :label="__('Existing')" value='existing' wire:model='existing'
                                        id="existing"></x-radio>
                                </div>
                            </div>
                        </div>

                        <div>
                            @if ($existing == 'new')
                            <x-input label="{{__('Name')}}" wire:model="name" name="name"></x-input>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                                <x-input label="{{__('Phone')}}" type="phone" wire:model="phone" name="phone"></x-input>
                                <x-input label="{{__('Email')}}" type="email" wire:model="email" name="email"></x-input>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-3">
                                <x-native-select label="{{__('Country')}}" placeholder="{{__('Country')}}"
                                    wire:model="country" name="country">
                                    @foreach (\Countries::getList(app()->getLocale(), 'php') as $key=> $jcountry)
                                    <option value="{{$key}}">{{$jcountry}}</option>
                                    @endforeach
                                </x-native-select>
                                <x-input label="{{__('City')}}" wire:model="city" name="city"></x-input>
                            </div>
                            @endif
                            @if ($existing == 'existing')
                            <x-native-select label="{{__('Select customer')}}" placeholder="{{__('Customer')}}"
                                wire:model="customer_id" name="customer_id">
                                @foreach ($company->customers as $key=> $cus)
                                <option value="{{$cus}}">{{$cus->name. '('.$cus->phone.'/'.$cus->email.')'}}</option>
                                @endforeach
                            </x-native-select>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-end space-x-4 mt-2 border-top">
        <x-button label="{{__('Cancel')}}" wire:click="closeModal"></x-button>
        @if($order->status == 'pending')
        <x-button type="submit" primary label="{{__('Charge')}}" wire:click.prevent="bill()">@lang("Charge")</x-button>
        @else
        <x-button type="submit" primary label="{{__('Download bill')}}" wire:click.prevent="download()">@lang("Download
            bill")</x-button>
        <x-button type="submit" primary label="{{__('Download receipt')}}" wire:click.prevent="receipt()">
            @lang("Download receipt")
        </x-button>
        @endif
    </div>
</x-card>