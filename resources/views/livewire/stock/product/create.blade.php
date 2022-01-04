<form wire:submit.prevent="save" class="bg-white px-4 py-2 space-y-3">
    <div class="border-b mb-2 pb-2">
        <h1 class="text-lg font-semibold">@lang("New product")</h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="md:col-span-2">
            <x-input label="{{__('Name')}}" wire:model="name" name="name"></x-input>
        </div>
        <x-native-select label="{{__('Category')}}" wire:model="category" name="category">
            @foreach ($categories as $jcategory)

            <option value="{{$jcategory->id}}">{{$jcategory->name}}</option>
            @endforeach
        </x-native-select>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <x-input label="{{__('Sell price')}}" type="number" wire:model="price" name="price"></x-input>
        <x-input label="{{__('Critical quantity')}}" type="number" wire:model="security_stock" name="security_stock">
        </x-input>
        <x-native-select label="Type" :options="[
                        ['name' => __('No Divisible'),  'id' => 'no_div'],
                        ['name' => __('Divisible in part'),  'id' => 'no_part'],
                        ['name' => __('Divisible in liter'),  'id' => 'no_liter'],
                        ['name' => __('Divisible in kilo'),  'id' => 'no_kilo'],
                        //['name' => __('Composed product'),  'id' => 'composed'],
                    ]" option-label="name" option-value="id" wire:model="type" />
    </div>
    <x-toggle wire:model="purchase" :label="__('Purchase now')"></x-toggle>
    @if ($purchase)
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <x-input label="{{__('Quantity')}}" type="number" wire:model="quantity" name="quantity"></x-input>
        <x-input label="{{__('Purchase price')}}" type="number" wire:model="purchase_price" name="purchase_price">
        </x-input>
    </div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-toggle :label="__('Expirable')" wire:model='expirable'></x-toggle>
        @if ($expirable)git c
        <x-datetime-picker without-timezone without-time without-tips label="{{__('Expiration date')}}"
            placeholder="{{__('Expiration date')}}" wire:model="expired_at" />
        @endif
    </div>

    <x-textarea wire:model="description" name="description" label="{{__('Description')}}"></x-textarea>
    <div class="flex justify-end space-x-4 mt-2 border-top">
        <x-button label="{{__('Cancel')}}" wire:click="closeModal"></x-button>
        <x-button type="submit" primary label="{{__('Save')}}">@lang("Save")</x-button>
    </div>
</form>