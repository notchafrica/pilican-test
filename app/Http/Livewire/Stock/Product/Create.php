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
    public $expired_at;
    public $type;
    public $security_stock;
    public $purchase_price;
    public $purchase = false;
    public $expirable = false;
    public function mount()
    {
        $this->company = auth()->user()->company;
    }

    public function save()
    {
        $this->validate([
            "name" => ['required'],
            "price" => ['required', 'numeric'],
            "expired_at" => ['nullable', 'date:future'],
            "purchase_price" => ['nullable', 'numeric'],
            "category" => ["nullable", Rule::exists('categories', 'id')->where(function ($query) {
                $query->where('company_id', $this->company->id);
            })],
            "type" => ['nullable', "in:no_div,div_part,div_kilo,div_liter,composed"]
        ]);

        $product = $this->company->products()->create([
            "name" => $this->name,
            "price" => $this->price,
            "sell_price" => $this->price,
            "description" => $this->description,
            "category_id" => $this->category,
            'expired_at' => $this->expired_at,
            "type" => $this->type ?? 'no_div',
            "security_stock" => $this->security_stock ?? 1,
            "user_id" => auth()->id()
        ]);

        if ($this->purchase) {
            $purchase =  $this->company->purchases()->create([
                'user_id' => auth()->id()
            ]);

            $purchase->products()->create([
                'product_id' => $product->id,
                'quantity' => $this->quantity,
                "movement" => "input",
                'expired_at' => $this->expirable ? $this->expired_at : null,
            ]);
        }

        $this->emit('productUpdated');
        $this->dispatchBrowserEvent('productUpdated');

        $this->closeModal();
    }
    public function render()
    {
        return view('livewire.stock.product.create', ['categories' => $this->company->categories]);
    }
}
