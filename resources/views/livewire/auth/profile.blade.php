<div class="flex">
    <div class="w-full md:w-80 flex-none px-6 h-auto md:min-h-screen bg-indigo-900 text-gray-100">
        <div class="h-full flex items-center">
            <div class="space-y-2 text-center">
                <h1 class='text-center text-3xl font-bold'>{{config('app.name')}}</h1>
                <h3 class="text-xl">@lang("Your management assistant")</h3>
                <p>@lang("Labsdel is a management software to follow your sales, your stock, your services, your
                    customers
                    and your partners.")</p>
            </div>
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
                <x-select label="{{__('Country')}}" placeholder="{{__('Country')}}" wire:model="country">
                    @foreach ($countries as $key => $country)
                    <x-select.option label="{{$country}}" value="{{$key}}">{{$country}}</x-select.option>
                    @endforeach
                </x-select>
                <x-input label="{{__('City')}}" name='city' wire:model.lazy="city"></x-input>
            </div>
            <x-input label="{{__('Address')}}" name='address' wire:model.lazy="address"></x-input>
            <div class="flex space-x-3 justify-end">
                <x-button type="submit" primary class="bg-indigo-900">@lang("Complete")</x-button>
            </div>
        </form>
    </div>
</div>