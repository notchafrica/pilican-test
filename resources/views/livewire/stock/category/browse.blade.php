<x-stock-layout>
    <div class="w-full space-y-4">
        <div class="flex justify-between items-end">
            <div>
                <h1 class="text-2xl font-semibold">@lang("Categories")</h1>
                <p>@lang("Stock overview")</p>
            </div>
            <div>
                <x-button primary icon="plus" wire:click="$emit('openModal', 'stock.category.create')">@lang("Create
                    category")
                </x-button>
            </div>
        </div>
        <div class="w-full" wire:pool.100ms>
            <livewire:stock.category.category-table :company="$company"></livewire:stock.category.category-table>
        </div>
    </div>
</x-stock-layout>