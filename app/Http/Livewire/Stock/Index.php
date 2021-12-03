<?php

namespace App\Http\Livewire\Stock;

use Livewire\Component;

class Index extends Component
{
    public $company;
    protected $listeners = ['stockUpdated' => "render"];
    public function mount()
    {
        $this->company = auth()->user()->company;
    }
    public function render()
    {
        return view('livewire.stock.index');
    }
}
