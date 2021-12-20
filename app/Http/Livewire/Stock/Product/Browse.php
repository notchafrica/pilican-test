<?php

namespace App\Http\Livewire\Stock\Product;

use Livewire\Component;

class Browse extends Component
{
    public $company;
    protected $listeners = ['productAdded' => 'render', 'productImported' => 'render'];

    public function mount()
    {
        $this->company = auth()->user()->company;
    }
    public function render()
    {
        return view('livewire.stock.product.browse');
    }
}
