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
            wire:model.defer="price.{{ $value }}">
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
            wire:model.defer="sprice.{{ $value }}">
        </x-input>
        <div class="flex items-end space-x-2">
            <x-input label="{{__('Quantity')}}" type="number" name="squantity.{{ $value }}"
                wire:model.defer="squantity.{{ $value }}"></x-input>
            <x-button icon="trash" negative wire:click.prevent="remove({{$key}}, 'service')" />
        </div>
    </div>
    @endforeach

    <div class="my-2 space-y-2">
        <div>
            <label>@lang("Payment method")</label>
            <div class="flex space-x-2 mt-2">
                <x-radio id="cash" value="cash" label="{{__('Cash')}}" wire:model="method" />
                <x-radio id="digital" value="digital" label="{{__('Digital payment')}}" wire:model="method" />
                <x-radio id="account" value="account" label="{{__('Account credit')}}" wire:model="method" />
            </div>
        </div>
        <div>
            <label>@lang("Customer")</label>
            <div class="grid grid-cols-3 gap-6">
                <x-radio :label="__('Inconito')" value='inconito' wire:model='existing' id="inconito"></x-radio>
                <x-radio :label="__('New')" value='new' wire:model='existing' id="new"></x-radio>
                <x-radio :label="__('Existing')" value='existing' wire:model='existing' id="existing"></x-radio>
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
            <x-native-select label="{{__('Country')}}" placeholder="{{__('Country')}}" wire:model="country"
                name="country">
                @foreach (\Countries::getList(app()->getLocale(), 'php') as $key=> $jcountry)
                <option value="{{$key}}">{{$jcountry}}</option>
                @endforeach
            </x-native-select>
            <x-input label="{{__('City')}}" wire:model="city" name="city"></x-input>
        </div>
        @endif
        @if ($existing == 'existing')
        <x-native-select label="{{__('Select customer')}}" placeholder="{{__('Customer')}}" wire:model="customer_id"
            name="customer_id">
            @foreach ($company->customers as $key=> $cus)
            <option value="{{$cus}}">{{$cus->name. '('.$cus->phone.'/'.$cus->email.')'}}</option>
            @endforeach
        </x-native-select>
        @endif
    </div>
    <div class="flex justify-end space-x-4 mt-2 border-top">
        <x-button label="{{__('Cancel')}}" wire:click="closeModal"></x-button>
        <x-button type="submit" primary label="{{__('Save')}}" wire:click.prevent="save()">@lang("Save")</x-button>
    </div>
</form>
