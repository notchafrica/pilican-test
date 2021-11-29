<form class="bg-white z-50">
    <x-input label="{{__('Name')}}" wire.model.defer="name"></x-input>
    <x-input label="{{__('email')}}" type="email" wire.model.defer="email"></x-input>
</form>
