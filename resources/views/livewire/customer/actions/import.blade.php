<form wire:submit.prevent="save" class="bg-white space-y-4 p-3">
    <div class="border-b mb-2 pb-2">
        <h1 class="text-lg font-semibold">@lang("Import customers")</h1>
    </div>
    <x-errors title="We found {errors} validation error(s)" />
    <input type="file" min="500" label="{{__('Amount')}}" name="amount" wire:model="file" />
    <div class="border-t flex py-2 justify-end space-x-3">
        <x-button label="{{__('Cancel')}}" wire:click="closeModal"></x-button>
        <x-button label="{{__('Import')}}" primary wire:click="import"></x-button>
    </div>
</form>
