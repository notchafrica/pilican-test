<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Details extends Component
{
    public $customer;
    public function mount($customer)
    {
        $this->customer = auth()->user()->company->customers()->whereCode($customer)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.customer.details');
    }
}
