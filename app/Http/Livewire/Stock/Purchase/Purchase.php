<?php

namespace App\Http\Livewire\Stock\Purchase;

use Livewire\Component;

class Purchase extends Component
{
    public $company;
    protected $listeners = ['purchaseUpdated' => "render"];
    public $i = 1;
    public function mount()
    {
        $this->company = auth()->user()->company;
    }


    public function render()
    {
        return view('livewire.stock.purchase');
    }
}
