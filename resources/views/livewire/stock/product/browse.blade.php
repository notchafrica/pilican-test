<x-stock-layout>
    <div class="w-full space-y-4">
        <div class="flex justify-between items-end">
            <div>
                <h1 class="text-2xl font-semibold">@lang("Products")</h1>
                <p>@lang("Stock overview")</p>
            </div>
            <div class="flex space-x-2">
                <x-button primary icon="plus" wire:click="$emit('openModal', 'stock.product.create')">@lang("Create
                    product")
                </x-button>
                <x-button label="{{__('Import products')}}" wire:click="$emit('openModal', 'stock.product.import')"
                    positive />
            </div>
        </div>
        <div class="w-full">
            <livewire:stock.product.table :company="$company"></livewire:stock.product.table>
        </div>
    </div>
</x-stock-layout>
