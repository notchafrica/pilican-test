<?php

namespace App\Http\Livewire\Provider;

use Livewire\Component;
use Livewire\WithPagination;

class Browse extends Component
{
    use WithPagination;

    protected $listeners = ['providerSaved' => 'render'];

    public function render()
    {
        $user = auth()->user();
        return view('livewire.provider.browse', ["providers" => $user->company->providers()->paginate()]);
    }
}
