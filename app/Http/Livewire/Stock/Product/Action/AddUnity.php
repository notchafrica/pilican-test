<?php

namespace App\Http\Livewire\Stock\Product\Action;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;

class AddUnity extends ModalComponent
{
    public $product;
    public $quantity;
    public $price;
    public $title;
    public $description;
    public $operation = "*";
    public function mount(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
    public function render()
    {
        return view('livewire.stock.product.action.add-unity');
    }

    public function save()
    {
        $this->validate([
            "title" => ['required'],
            "quantity" => ['required', 'numeric'],
            "price" => ['required', 'numeric'],
            "operation" => ['required', 'in:*,/'],
        ]);

        $this->product->unities()->create([
            "title" => $this->title,
            "quantity" => $this->quantity,
            "price" => $this->price,
            "operation" => $this->operation,
            "user_id" => auth()->id()
        ]);
        $this->emit('stockUpdated');
        $this->closeModal();
    }
}
