<form wire:submit.prevent="save" class="bg-white px-4 py-2 space-y-3 ">
    <div class="border-b mb-2 pb-2 flex justify-between">
        <h1 class="text-lg font-semibold">@lang("New purchase")</h1>
        <div>
            <x-button icon="plus" success wire:click.prevent="add({{$i}})" />
        </div>
    </div>
    @foreach($inputs as $key => $value)
    <div class="grid gap-4 grid-cols-1 md:grid-cols-2">
        <x-select :label="__('Select product')" :placeholder="__('Select product')" name="product.{{ $value }}"
            wire:model.lazy="product.{{ $value }}">
            @foreach ($company->products as $product)
            <x-select.option value="{{$product->id}}">{{$product->name}}</x-select.option>
            @endforeach
        </x-select>
        <x-select :label="__('Select unity')" :placeholder="__('Select product')" name="product.{{ $value }}">
            @foreach ($company->products as $product)
            <x-select.option value="{{$product->id}}">{{$product->name}}</x-select.option>
            @endforeach
        </x-select>
        <x-input label="{{__('Purchase price')}}" type="number" name="price.{{ $value }}"
            wire:model.defer="price.{{ $value }}">
        </x-input>
        <div class="flex items-end space-x-2">
            <x-input label="{{__('Quantity')}}" type="number" name="quantity.{{ $value }}"
                wire:model.defer="quantity.{{ $value }}"></x-input>
            <x-button icon="trash" negative wire:click.prevent="remove({{$key}})" />
        </div>
    </div>
    @endforeach
    <div class="flex justify-end space-x-4 pt-32">
        <x-button label="{{__('Cancel')}}" wire:click="closeModal"></x-button>
        <x-button type="submit" primary label="{{__('Save')}}" wire:click.prevent="save()">@lang("Save")</x-button>
    </div>
</form>

