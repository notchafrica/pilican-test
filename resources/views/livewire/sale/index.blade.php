<div class="w-full space-y-4 p-4">
    <div class="flex justify-between items-end">
        <div>
            <h1 class="text-2xl font-semibold">@lang("Sales")</h1>
            <p>@lang("Sales overview")</p>
        </div>
        <div>
            <x-button primary icon="plus" wire:click="$emit('openModal', 'sale.create')">@lang("New sale")
            </x-button>
        </div>
    </div>
    <div class="w-full">
        <livewire:sale.table :company="$company"></livewire:sale.table>
    </div>
</div>
