<?php

namespace App\Http\Livewire\Stock\Product;

use Illuminate\Validation\Rule;
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
            "category" => ["nullable", Rule::exists('categories', 'id')->where(function ($query) {
                $query->where('company_id', $this->company->id);
            })],
            "type" => ['nullable', "in:no_div,div_part,div_kilo,div_liter,composed"]
        ]);

        $this->company->products()->create([
            "name" => $this->name,
            "price" => $this->price,
            "purchase_price" => $this->purchase_price,
            "sell_price" => $this->purchase_price,
            "description" => $this->description,
            "category_id" => $this->category,
            "type" => $this->type ?? 'no_div',
            "security_stock" => $this->security_stock,
            "quantity" => $this->quantity,
            "user_id" => auth()->id()
        ]);

        $this->emit('productUpdated');
        $this->closeModal();
    }
    public function render()
    {
        return view('livewire.stock.product.create', ['categories' => $this->company->categories]);
    }
}
