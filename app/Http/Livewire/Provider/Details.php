<?php

namespace App\Http\Livewire\Provider;

use Livewire\Component;
use Livewire\WithPagination;

class Details extends Component
{
    use WithPagination;
    public $provider;
    protected $listeners = ['providerUpdated' => 'refreshProvider'];
    public function mount($provider)
    {
        $this->provider = auth()->user()->company->providers()->whereCode($provider)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.provider.details', ['transactions' => collect([])]);
    }

    public function refreshProvider()
    {
        $this->provider->refresh();
    }
}
