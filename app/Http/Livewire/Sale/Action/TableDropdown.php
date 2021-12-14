<?php

namespace App\Http\Livewire\Sale\Action;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class TableDropdown extends ModalComponent
{

    public function render()
    {
        return view('livewire.sale.action.table-dropdown');
    }
}
