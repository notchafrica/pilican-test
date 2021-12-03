<form wire:submit.prevent="save" class="bg-white px-4 py-2 space-y-3">
    <div class="border-b mb-2 pb-2">
        <h1 class="text-lg font-semibold">@lang("New product")</h1>
    </div>
    <div class="grid grid-cols-1 gap-4">
        <x-input label="{{__('Name')}}" wire:model="name" name="name"></x-input>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-input label="{{__('Price')}}" type="number" wire:model="price" name="price"></x-input>
        <x-input label="{{__('Purchase price')}}" type="number" wire:model="purchase_price" name="purchase_price">
        </x-input>
    </div>
    <x-textarea wire:model="description" name="description" label="{{__('Description')}}"></x-textarea>
    <div class="flex justify-end space-x-4 mt-2 border-top">
        <x-button label="{{__('Cancel')}}" wire:click="closeModal"></x-button>
        <x-button type="submit" primary label="{{__('Save')}}">@lang("Save")</x-button>
    </div>
</form>
