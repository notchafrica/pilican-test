<x-staff-layout>
    <div class="w-full space-y-4">
        <div class="flex justify-between items-end">
            <div>
                <h1 class="text-2xl font-semibold">@lang("Roles")</h1>
                <p>@lang("Account roles")</p>
            </div>
        </div>
        <div class="w-full">
            <livewire:staff.role.table></livewire:staff.role.table>
        </div>
    </div>
</x-staff-layout>
