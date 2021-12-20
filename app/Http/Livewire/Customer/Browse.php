<?php

namespace App\Http\Livewire\Customer;

use App\Imports\CustomersImport;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Browse extends Component
{
    use WithPagination;

    protected $listeners = ['customerSaved' => 'render'];

    /* public function import()
    {
        \Excel::import(new CustomersImport, $this->file);
    } */

    public function render()
    {
        $user = auth()->user();
        return view('livewire.customer.browse', ["customers" => $user->company->customers()->paginate()]);
    }
}
