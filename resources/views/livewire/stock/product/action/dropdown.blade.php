<x-button wire:click='openModal({{$product->id}})' class="flex space-x-1">
    <x-icon class="w-4 text-primary-500" name="calculator" solid></x-icon>
    @if ($product->unities()->count()> 0)
    <span>{{$product->unities()->count()}}</span>
    @endif
</x-button>
