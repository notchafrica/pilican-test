<form wire:submit.prevent="save" class="bg-white px-4 py-2 space-y-3">
    <div class="border-b mb-2 pb-2">
        <h1 class="text-lg font-semibold">@lang("New cashout")</h1>
    </div>
    <x-input type="number" min="500" label="{{__('Amount')}}" name="amount" icon="credit-card" thousands=" " decimal="."
        precision="4" wire:model="amount" />
    <x-textarea wire:model.lazy="reason" label="{{__('Reason')}}" name="reason"></x-textarea>

    <div class="flex justify-end space-x-4 mt-2 border-top">
        <x-button label="{{__('Cancel')}}" wire:click="closeModal"></x-button>
        <x-button type="submit" primary label="{{__('Save')}}" wire:click.prevent="save()">@lang("Save")</x-button>
    </div>
</form>
