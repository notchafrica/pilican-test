<form wire:submit.prevent="save" class="bg-white space-y-4 p-3">
    <div class="border-b mb-2 pb-2">
        <h1 class="text-lg font-semibold">@lang("Add credit to customer")</h1>
    </div>
    <x-input type="number" min="500" label="{{__('Amount')}}" name="amount" icon="credit-card" thousands=" " decimal="."
        precision="4" wire:model="amount" />
    <div>
        <label>@lang("Payment method")</label>
        <div class="flex space-x-2 mt-2">
            <x-radio id="cash" value="cash" label="{{__('Cash')}}" wire:model="method" />
            <x-radio id="digital" value="digital" label="{{__('Digital payment')}}" wire:model="method" />
        </div>
    </div>
    @if ($method == 'digital')
    <x-input type="number" label="{{__('reference')}}" name="amount" icon="hashtag" thousands=" " decimal="."
        wire:model="reference" />
    @endif
    <x-textarea wire:model.lazy="reason" label="{{__('Reason')}}" name="reason"></x-textarea>
    <div class="border-t flex py-2 justify-end space-x-3">
        <x-button label="{{__('Cancel')}}" wire:click="closeModal"></x-button>
        <x-button label="{{__('Add credit')}}" primary wire:click="save"></x-button>
    </div>
</form>
