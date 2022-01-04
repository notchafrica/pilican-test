<form wire:submit.prevent="save" class="bg-white px-4 py-2 space-y-3">
    <div class="border-b mb-2 pb-2 flex justify-between">
        <h1 class="text-lg font-semibold">@lang("New sale")</h1>
        <div class="flex space-x-2">
            <x-button icon="plus" primary :label="__('Product')" success wire:click.prevent="add({{$i}})" />
            <x-button icon="plus" secondary :label="__('Service')" success
                wire:click.prevent="add({{$j}}, 'service')" />
        </div>
    </div>

    @foreach($inputs as $key => $value)
    <div class="grid gap-4 grid-cols-1 md:grid-cols-3">
        <x-native-select :label="__('Select product')" :placeholder="__('Select product')" name="product.{{ $value }}"
            wire:model.defer="product.{{ $value }}">
            <option>@lang("Select product")</option>
            @foreach ($company->products as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        </x-native-select>
        <x-input label="{{__('Sell price')}}" type="number" name="price.{{ $value }}"
            value="{{App\Models\Product::find($value)->price}}"
            :readonly="!auth()->user()->hasAnyRole('super-admin|admin')" wire:model.defer="price.{{ $value }}">
        </x-input>
        <div class="flex items-end space-x-2">
            <x-input label="{{__('Quantity')}}" type="number" name="quantity.{{ $value }}"
                wire:model.defer="quantity.{{ $value }}"></x-input>
            <x-button icon="trash" negative wire:click.prevent="remove({{$key}})" />
        </div>
    </div>
    @endforeach
    @foreach($inputs_s as $key => $value)
    <div class="grid gap-4 grid-cols-1 md:grid-cols-3">
        <x-native-select :label="__('Select service')" :placeholder="__('Select service')" name="service.{{ $value }}"
            wire:model.defer="service.{{ $value }}">
            <option>@lang("Select service")</option>
            @foreach ($company->services as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        </x-native-select>
        <x-input label="{{__('Sell price')}}" type="number" name="sprice.{{ $value }}"
            value="{{App\Models\Service::find($value)->price}}"
            :readonly="!auth()->user()->hasAnyRole('super-admin|admin')" wire:model.defer="sprice.{{ $value }}">
        </x-input>
        <div class="flex items-end space-x-2">
            <x-input label="{{__('Quantity')}}" type="number" name="squantity.{{ $value }}"
                wire:model.defer="squantity.{{ $value }}"></x-input>
            <x-button icon="trash" negative wire:click.prevent="remove({{$key}}, 'service')" />
        </div>
    </div>
    @endforeach

    <div class="flex justify-end space-x-4 mt-2 border-top">
        <x-button label="{{__('Cancel')}}" wire:click="closeModal"></x-button>
        <x-button type="submit" primary label="{{__('Save')}}" wire:click.prevent="save()">@lang("Save")</x-button>
    </div>
</form>