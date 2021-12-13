<form wire:submit.prevent="save" class="bg-white px-4 py-2">
    <div class="border-b mb-2 pb-2">
        <h1 class="text-lg font-semibold">@lang("New user")</h1>
    </div>
    <div class="grid gap-5">
        <x-input label="{{__('Name')}}" wire:model="name" name="name"></x-input>
        <x-input label="{{__('Phone')}}" wire:model="phone" name="phone"></x-input>
        <x-input label="{{__('Email')}}" wire:model="email" name="email"></x-input>
        <div class="grid grid-cols-2 gap-4">
            @foreach ($jroles as $role)
            <x-checkbox id="role-{{$role->id}}" label="{{ucfirst($role->name)}}" value="{{$role->id}}"
                wire:model="roles" />
            @endforeach
        </div>
        <x-input label="{{__('Password')}}" wire:model="password" name="password"></x-input>
    </div>
    <div class="flex justify-end space-x-4 mt-2 border-top">
        <x-button label="{{__('Cancel')}}" wire:click="closeModal"></x-button>
        <x-button type="submit" primary label="{{__('Save')}}">@lang("Save")</x-button>
    </div>
</form>
