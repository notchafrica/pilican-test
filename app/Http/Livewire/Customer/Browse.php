<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;

class Browse extends Component
{
    use WithPagination;

    protected $listeners = ['customerSaved' => 'render'];

    public function render()
    {
        $user = auth()->user();
        return view('livewire.customer.browse', ["customers" => $user->company->customers()->paginate()]);
    }
}
