<form wire:submit.prevent="save" class="bg-white px-4 py-2">
    <div class="border-b mb-2 pb-2">
        <h1 class="text-lg font-semibold">@lang("New Category")</h1>
    </div>
    <x-input label="{{__('Name')}}" wire:model="name" name="name"></x-input>
    <x-textarea wire:model="description" name="description" label="{{__('Description')}}"></x-textarea>
    <div class="flex justify-end space-x-4 mt-2 border-top">
        <x-button label="{{__('Cancel')}}" wire:click="closeModal"></x-button>
        <x-button type="submit" primary label="{{__('Save')}}">@lang("Save")</x-button>
    </div>
</form>
