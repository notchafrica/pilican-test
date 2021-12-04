<form wire:submit.prevent="save" class="bg-white px-4 py-2 space-y-3">
    <div class="border-b mb-2 pb-2">
        <h1 class="text-lg font-semibold">@lang("New sale")</h1>
    </div>
    <div class="flex justify-end">
        <x-button label="Add product" wire:click.prevent="addProduct"></x-button>
    </div>

    <div class="overflow-hidden shadow">
        <table class="w-full">
            {{--<thead>
                <tr>
                    <th class="px-4 py-2">@lang("Product")</th>
                    <th class="px-4 py-2">@lang("Quantity")</th>
                    <th class="px-4 py-2">@lang("Sell price")</th>
                    <th class="px-4 py-2">@lang("Total")</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>--}}
            <tbody>
            @foreach($products as $key => $product)
                <tr>
                    <td class="border-t border-b px-4 py-2">
                        <div class="flex items-center">
                            <x-input type="number" wire:model.lazy="products.{{$key}}.product" class="w-full h-8 px-2 text-center" />
                        </div>
                    </td>
                    <td class="border-t border-b px-4 py-2">
                        <div class="flex items-center">
                            <x-input type="number" wire:model.lazy="products.{{$key}}.quantity" class="w-full h-8 px-2 text-center" />
                        </div>
                    </td>
                    <td class="border-t border-b px-4 py-2">
                        <div class="flex items-center">
                            <x-input type="number" wire:model.lazy="products.{{$key}}.product" class="w-full h-8 px-2 text-center" />
                        </div>
                    </td>
                    <td class="border-t border-b px-4 py-2">
                        <div class="flex items-center">
                            <x-button icon="trash" negative wire:click.prevent="removeProduct($key)"></x-button>
                        </div>
                    </td>
                </tr>
            @endforeach
            {{--@foreach ($products as $key => $value)
                <tr>
                    <td class="border-t border-b px-4 py-2">
                        <div class="flex items-center">
                            <input type="number" wire:model.lazy="name.{{$value}}" class="w-full h-8 px-2 text-center"
                        </div>
                    </td>
                    <td class="border-t border-b px-4 py-2">
                        <div class="flex items-center">
                            <x-button icon="trash" negative wire:click.prevent="removeProduct($value)"></x-button>
                        </div>
                    </td>

                </tr>
            @endforeach--}}
            </tbody>
        </table>
    </div>



    {{--@forelse ($products as $key => $product)
    <div>
        <h2>@lang("Products")</h2>
        {{$products}}
    </div>
    @empty
    <div class="h-60 flex items-center flex-col text-center w-full">
        <x-icon name="inbox" class="w-24 mt-12"></x-icon>
        <h2 class="text-center">@lang("None items selected")</h2>
    </div>
    @endforelse--}}
</form>
