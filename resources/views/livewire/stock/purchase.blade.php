<x-stock-layout>
    <div class="w-full space-y-4">
        <div class="flex justify-between items-end">
            <div>
                <h1 class="text-2xl font-semibold">@lang("Purchases")</h1>
                <p>@lang("Manage stock purchase")</p>
            </div>
            <div>
                <x-button primary icon="inbox" wire:click="$emit('openModal', 'stock.purchase.create')">@lang("New
                    purchase")
                </x-button>
            </div>
        </div>
        <div class="w-full">
            <livewire:stock.purchase.purchase-table :company="$company"></livewire:stock.purchase.purchase-table>
        </div>
    </div>
</x-stock-layout>
