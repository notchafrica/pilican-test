<x-stock-layout>
    <div class="w-full space-y-4">
        <div class="flex justify-between items-end">
            <div>
                <h1 class="text-2xl font-semibold">@lang("Services")</h1>
                <p>@lang("Stock overview")</p>
            </div>
            <div>
                <x-button primary icon="plus" wire:click="$emit('openModal', 'stock.service.create')">@lang("Create
                    service")
                </x-button>
            </div>
        </div>
        <div class="w-full">
            <livewire:stock.service.table :company="$company"></livewire:stock.service.table>
        </div>
    </div>
</x-stock-layout>
