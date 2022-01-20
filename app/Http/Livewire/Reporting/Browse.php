<?php

namespace App\Http\Livewire\Reporting;

use Livewire\Component;

class Browse extends Component
{

    public function render()
    {
        return view('livewire.reporting.browse', ['company' => auth()->user()->company]);
    }
}
