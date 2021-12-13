<x-staff-layout>
    <div class="w-full space-y-4">
        <div class="flex justify-between items-end">
            <div>
                <h1 class="text-2xl font-semibold">@lang("Users")</h1>
                <p>@lang("Company users")</p>
            </div>
            <div>
                <x-button primary icon="plus" wire:click="$emit('openModal', 'staff.user.create')">@lang("Add user")
                </x-button>
            </div>
        </div>
        <div class="w-full">
            <livewire:staff.user.table :company="$company"></livewire:staff.user.table>
        </div>
    </div>
</x-staff-layout>
