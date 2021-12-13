<?php

namespace App\Http\Livewire\Stock\Purchase;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Details extends ModalComponent
{
    public $purchase;
    public function mount($purchase)
    {
        $this->purchase = $purchase;
    }
    public function render()
    {
        return view('livewire.stock.purchase.details', ['products' => $this->purchase]);
    }
}
