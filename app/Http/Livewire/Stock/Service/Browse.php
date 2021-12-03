<?php

namespace App\Http\Livewire\Stock\Service;

use Livewire\Component;

class Browse extends Component
{
    public $company;
    protected $listeners = ['serviceAdded' => 'render'];

    public function mount()
    {
        $this->company = auth()->user()->company;
    }
    public function render()
    {
        return view('livewire.stock.service.browse');
    }
}
