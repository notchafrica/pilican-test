<?php

namespace App\Http\Livewire\Stock\Category;

use Livewire\Component;
use Livewire\WithPagination;

class Browse extends Component
{
    use WithPagination;
    public $company;
    protected $listeners = ['categoryAdded' => 'render'];

    public function mount()
    {
        $this->company = auth()->user()->company;
    }

    public function render()
    {
        return view('livewire.stock.category.browse', ['categories' => $this->company->categories()->paginate()]);
    }
}
