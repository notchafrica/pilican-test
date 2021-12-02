<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;

class Details extends Component
{
    use WithPagination;
    public $customer;
    protected $listeners = ['customerUpdated' => 'refreshCustomer'];
    public function mount($customer)
    {
        $this->customer = auth()->user()->company->customers()->whereCode($customer)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.customer.details', ['transactions' => $this->customer->transactions()->orderBy('created_at', 'desc')->paginate()]);
    }


    public function refreshCustomer()
    {
        $this->customer->refresh();
    }
}
