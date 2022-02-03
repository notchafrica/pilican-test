<?php

namespace App\Http\Livewire\Reporting;

use App\Models\Reporting;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Details extends ModalComponent
{
    public $reporting;

    public function mount(Reporting $reporting)
    {
        $this->reporting = $reporting;
    }

    public function render()
    {
        return view('livewire.reporting.details');
    }
}
