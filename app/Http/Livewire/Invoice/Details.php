<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Order;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class Details extends ModalComponent
{
    use Actions;
    public $order;
    public $tax = false;
    public $amount;
    public $trade = [
        "show" => false,
        "amount" => 0,
    ];
    public $fees = [
        "show" => false,
        "amount" => 0,
    ];
    public $quantity = [
        "show" => false,
        "amount" => 0,
    ];
    public $shipping = [
        "show" => false,
        "amount" => 0,
    ];
    public function mount(Order $order)
    {
        $this->order = $order;
        $this->amount = $order->amount;
    }

    public function addFees()
    {
        $this->fees = [
            "show" => true,
            "amount" => 0,
        ];
    }

    public function addTrade()
    {
        $this->trade = [
            "show" => true,
            "amount" => 0,
        ];
    }

    public function addShipping()
    {
        $this->shipping = [
            "show" => true,
            "amount" => 0,
        ];
    }

    public function addQuantity()
    {
        $this->quantity = [
            "show" => true,
            "amount" => 0,
        ];
    }

    public function feeFees()
    {
        $this->fees = [
            "show" => false,
            "amount" => 0,
        ];
    }

    public function remTrade()
    {
        $this->trade = [
            "show" => false,
            "amount" => 0,
        ];
    }

    public function remShipping()
    {
        $this->shipping = [
            "show" => false,
            "amount" => 0,
        ];
    }

    public function remQuantity()
    {
        $this->quantity = [
            "show" => false,
            "amount" => 0,
        ];
    }

    public function updatedFees($value)
    {
        if ($value) {
            $this->amount = $this->$value;
        }
    }
    public function render()
    {
        return view('livewire.invoice.details');
    }
}
