<?php

namespace App\Http\Livewire\Stock\Service;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $name;
    public $company;
    public $price;
    public $quantity;
    public $description;
    public $category;
    public $type;
    public $security_stock;
    public $purchase_price;
    public function mount()
    {
        $this->company = auth()->user()->company;
    }

    public function save()
    {
        $this->validate([
            "name" => ['required'],
            "price" => ['required', 'numeric'],
            "purchase_price" => ['required', 'numeric'],
        ]);

        $this->company->services()->create([
            "name" => $this->name,
            "price" => $this->price,
            "purchase_price" => $this->purchase_price,
            "sell_price" => $this->purchase_price,
            "description" => $this->description,
            "user_id" => auth()->id()
        ]);

        $this->emit('serviceUpdated');
        $this->closeModal();
    }
    public function render()
    {
        return view('livewire.stock.service.create');
    }
}
