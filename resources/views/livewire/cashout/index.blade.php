<x-invoice-layout>
    <div class="w-full space-y-4 p-4">
        <div class="flex justify-between items-end">
            <div>
                <h1 class="text-2xl font-semibold">@lang("Cashout")</h1>
                <p>@lang("Cashout overview")</p>
            </div>
            <div>
                <x-button :label="__('New Cashout')" primary icon="plus"
                    wire:click="$emit('openModal', 'cashout.create')">
                </x-button>
            </div>
        </div>
        <div class="w-full">
            <livewire:cashout.table :company="$company">
            </livewire:cashout.table>
        </div>
    </div>
</x-invoice-layout>
