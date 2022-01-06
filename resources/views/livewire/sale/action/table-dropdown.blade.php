<div class="flex space-x-1">
    <x-button wire:click='openModal({{$sale->id}})'>@lang("Details")</x-button>
    @if ($sale->status == 'complete')
    <x-button icon="newspaper" primary wire:click='downloadBill({{$sale->id}})' />
    <x-button icon="paper-airplane" secondary wire:click='openModal({{$sale->id}})' />
    @endif
</div>