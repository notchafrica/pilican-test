<?php

namespace App\Http\Livewire\Staff\User;

use Livewire\Component;

class Browse extends Component
{
    public $company;
    public function mount()
    {
        $this->company = auth()->user()->company;
    }
    public function render()
    {
        return view('livewire.staff.user.browse');
    }
}
