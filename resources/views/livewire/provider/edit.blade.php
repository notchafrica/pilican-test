<form class="bg-white px-4 py-2" wire:submit.prevent="save">
    <div class="border-b mb-2 pb-2">
        <h1 class="text-lg font-semibold">@lang("New provider")</h1>
    </div>
    <x-input label="{{__('Name')}}" wire:model="name" name="name"></x-input>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
        <x-input label="{{__('Phone')}}" type="phone" wire:model="phone" name="phone"></x-input>
        <x-input label="{{__('Email')}}" type="email" wire:model="email" name="email"></x-input>
    </div>
    <x-textarea wire:model="about" name="about" label="{{__('About')}}"></x-textarea>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-3">
        <x-native-select label="{{__('Country')}}" placeholder="{{__('Country')}}" wire:model="country" name="country">
            @foreach ($countries as $key=> $country)
            <option value="{{$key}}">{{$country}}</option>
            @endforeach
        </x-native-select>
        <x-input label="{{__('City')}}" wire:model="city" name="city"></x-input>
    </div>
    <x-input label="{{__('Address')}}" wire:model="address" name="address"></x-input>
    <div class="flex justify-end space-x-4 mt-2 border-top">
        <x-button label="{{__('Cancel')}}" wire:click="closeModal"></x-button>
        <x-button type="submit" primary label="{{__('Save')}}">@lang("Save")</x-button>
    </div>
</form>
