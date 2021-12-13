<?php

namespace App\Http\Livewire\Stock\Purchase;

use Livewire\Component;

class Button extends Component
{
    public function openModal($id)
    {
        $this->emit("openModal", "stock.purchase.details");
    }
    public function render()
    {
        return view('livewire.stock.purchase.button');
    }
}
