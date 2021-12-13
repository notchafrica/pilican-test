<?php

namespace App\Http\Livewire\Stock\Purchase;

use Illuminate\Validation\Rule;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $inputs = [];
    public $product;
    public $quantity;
    public $note;
    public $i = 1;
    public $company;

    public function mount()
    {
        $this->company = auth()->user()->company;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function save()
    {
        $this->validate([
            'product.*' => [
                'required', Rule::exists('products', 'id')->where(function ($query) {
                    $query->whereCompanyId($this->company->id);
                }),
                'quantity.*' => ['required', 'numeric']
            ]
        ]);



        $purchase = $this->company->purchases()->create([
            'user_id' => auth()->id()
        ]);

        foreach ($this->product as $key => $value) {
            $purchase->products()->create([
                'product_id' => $this->product[$key],
                'quantity' => $this->quantity[$key],
            ]);
        }

        $this->closeModal();
    }
    public function render()
    {
        return view('livewire.stock.purchase.create');
    }
}
