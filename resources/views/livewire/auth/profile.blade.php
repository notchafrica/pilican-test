<div class="flex">
    <div class="w-full md:w-80 flex-none px-6 h-auto md:min-h-screen bg-green-900 text-gray-100">
        <div class="h-full flex items-center">
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque mollitia harum, quas sapiente pariatur
                neque, officia hic repellat at optio amet, cum molestias illo labore nulla repellendus nostrum nam
                beatae.</div>
        </div>
    </div>
    <div class="flex-grow flex items-center overflow-y-auto">
        <form class="md:w-3/6 w-full lg:w-2/5 mx-auto space-y-4" wire:submit.prevent="complete">
            <x-input label="{{__('Company name')}}" name='name' lg wire:model.lazy="name"></x-input>
            <x-textarea label='{{__("About")}}' wire:model.lazy="about" name="about"></x-textarea>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <x-input label="{{__('Phone')}}" name='phone' wire:model.lazy="phone"></x-input>
                <x-input label="{{__('Email')}}" name='email' wire:model.lazy="email" type="email"></x-input>
            </div>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <x-native-select label="{{__('Country')}}" wire:model="country">
                    @foreach ($countries as $key => $country)
                    <option value="{{$key}}">{{$country}}</option>
                    @endforeach
                </x-native-select>
                <x-input label="{{__('City')}}" name='city' wire:model.lazy="city"></x-input>
            </div>
            <x-input label="{{__('Address')}}" name='address' wire:model.lazy="address"></x-input>
            <div class="flex space-x-3 justify-end">
                <x-button type="submit" primary>@lang("Complete")</x-button>
            </div>
        </form>
    </div>
</div>
