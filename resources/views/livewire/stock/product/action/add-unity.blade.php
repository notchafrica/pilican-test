<form wire:submit.prevent="save" class="bg-white px-4 py-2 space-y-3">
    <div class="border-b mb-2 pb-2">
        <h1 class="text-lg font-semibold">@lang("Add unity to :product", ['product'=> $product->name])</h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="md:col-span-2">
            <x-input label="{{__('Name')}}" wire:model="title" name="title"></x-input>
        </div>
        <div>
            <label for="">@lang("Type")</label>
            <div class="flex flex-col">
                <x-radio id="operation-mult" :label="__('Multiple')" wire:model.lazy="operation" value="*" />
                <x-radio id="operation-sub-mult" :disabled="$product->type == 'no_div'" :label="__('Sub-multiple')"
                    wire:model.lazy="operation" value="/" />
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-input label="{{__('Quantity')}}" type="number" wire:model="quantity" name="quantity"></x-input>
        <x-input label="{{__('Price')}}" type="number" wire:model="price" name="price"></x-input>
    </div>
    <div>
        <label class="text-sm italic text-primary-500">@lang("Unique price"): {{$product->sell_price}} FCFA</label>
        @if ($quantity && $quantity > 0)
        @if ($operation == "*")
        <label class="text-sm italic text-primary-500">@lang("Total price"): {{$product->sell_price * $quantity}}
            FCFA</label>
        @elseif ($operation == "/")
        <label class="text-sm italic text-primary-500">@lang("Total price"): {{$product->sell_price / $quantity}}
            FCFA</label>
        @endif
        @endif
    </div>
    <x-textarea wire:model="description" name="description" label="{{__('Description')}}"></x-textarea>
    <div class="flex justify-end space-x-4 mt-2 border-top">
        <x-button label="{{__('Cancel')}}" wire:click="closeModal"></x-button>
        <x-button type="submit" primary label="{{__('Save')}}">@lang("Save")</x-button>
    </div>
</form>
