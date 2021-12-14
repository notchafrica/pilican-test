<?php

namespace App\Http\Livewire\Sale;

use App\Models\Order;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Details extends ModalComponent
{
    public $order;
    public function mount(Order $order)
    {
        $this->order = $order;
    }
    public function render()
    {
        return view('livewire.sale.details');
    }
}
