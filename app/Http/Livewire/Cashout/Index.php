<?php

namespace App\Http\Livewire\Cashout;

use Livewire\Component;

class Index extends Component
{
    public $company;

    public function mount()
    {
        $this->company = auth()->user()->company;
    }
    public function render()
    {
        return view('livewire.cashout.index');
    }
}
