<x-invoice-layout>
    <div class="w-full space-y-4 p-4">
        <div class="flex justify-between items-end">
            <div>
                <h1 class="text-2xl font-semibold">@lang("Invoices")</h1>
                <p>@lang("Invoices overview")</p>
            </div>
            <div>
                <x-button wire:click="close" primary>@lang("Closing the day")</x-button>
            </div>
        </div>
        <div class="w-full">
            <livewire:invoice.table :company="$company"></livewire:invoice.table>
        </div>
    </div>
</x-invoice-layout>
