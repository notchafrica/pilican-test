<x-stock-layout>
    <div class="w-full space-y-4">
        <div>
            <h1 class="text-2xl font-semibold">@lang("Stock")</h1>
            <p>@lang("Stock overview")</p>
        </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            <div class="bg-white border shadow w-full p-2 rounded justify-center text-center flex flex-col space-y-1">
                <h1 class="text-2xl">{{$company->categories()->count()}}</h1>
                <p class="text-gray-500">@lang("Categories")</p>
                <x-button icon="plus" primary wire:click="$emit('openModal', 'stock.category.create')">@lang("New
                    Category")
                </x-button>
            </div>
            <div class="bg-white border shadow w-full p-2 rounded justify-center text-center flex flex-col space-y-1">
                <h1 class="text-2xl">{{$company->products()->count()}}</h1>
                <p class="text-gray-500">@lang("Products")</p>
                <x-button icon="plus" primary wire:click="$emit('openModal', 'stock.product.create')">@lang("New
                    Product")</x-button>
            </div>
            <div class="bg-white border shadow w-full p-2 rounded justify-center text-center flex flex-col space-y-1">
                <h1 class="text-2xl">{{$company->services()->count()}}</h1>
                <p class="text-gray-500">@lang("Services")</p>
                <x-button icon="plus" primary wire:click="$emit('openModal', 'stock.service.create')">@lang("New
                    Service")</x-button>
            </div>
        </div>
    </div>
</x-stock-layout>
