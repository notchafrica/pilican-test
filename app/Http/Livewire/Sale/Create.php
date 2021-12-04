<?php

namespace App\Http\Livewire\Sale;

use Illuminate\Support\Arr;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $products = [];
    public $product, $quantity, $price, $customer_name, $customer_phone, $customer_email, $customer_id;
    public function mount()
    {
        //$this->products = collect([]);
    }
    public function render()
    {
        return view('livewire.sale.create');
    }

    public function addProduct()
    {
        $this->products[] = [
            'product' => "",
            'quantity' => 1,
            'price' => 1,
        ];
    }

    public function removeProduct($i)
    {
        unset($this->products[$i]);
    }
}
