<div class="w-full space-y-4 p-4">
    <div class="flex justify-between items-end">
        <div>
            <h1 class="text-2xl font-semibold">@lang("Reporting")</h1>
            <p>@lang("Reporting overview")</p>
        </div>
    </div>
    <div class="w-full">
        <livewire:reporting.table :company="$company"></livewire:reporting.table>
    </div>
</div>
