<form class="bg-white px-4 py-2">
    <div class="border-b mb-2 pb-2">
        <h1 class="text-lg font-semibold">@lang("New customer")</h1>
    </div>
    <x-input label="{{__('Name')}}" wire.model.defer="name"></x-input>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
        <x-input label="{{__('Phone')}}" type="phone" wire.model.defer="phone"></x-input>
        <x-input label="{{__('Email')}}" type="email" wire.model.defer="email"></x-input>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-3">
        <x-select label="{{__('Country')}}" placeholder="{{__('Country')}}" wire:model.defer="country">
            @foreach ($countries as $country)
            <x-select.option label="{{$country}}" value="{{$country}}" />
            @endforeach
        </x-select>
        <x-input label="{{__('City')}}" wire.model.defer="city"></x-input>
    </div>
    <x-input label="{{__('Address')}}" wire.model.defer="address"></x-input>
    <div>
        <x-button label="{{__('Cancel')}}"></x-button>
        <x-button type="submit" primary label="{{__('Save')}}">@lang("Save")</x-button>
    </div>
</form>
