<?php

namespace App\Http\Livewire\Invoice;

use Livewire\Component;

class Index extends Component
{
    public $company;

    public function mount()
    {
        $this->company = auth()->user()->company;
    }

    public function close()
    {
        $this->company->reportings()->create([
            'products' => $this->company->products()->count(),
            'services' => $this->company->services()->count(),
            'customers' => $this->company->customers()->count(),
            'customer_cash' => $this->company->customers()->sum('balance'),
            'provider_cash' => $this->company->providers()->sum('balance'),
            'providers' => $this->company->providers()->count(),
            'invoices' => $this->company->invoices()->whereDate('created_at', now())->count(),
            'purchases' => $this->company->purchases()->whereDate('created_at', now())->count(),
            'categories' => $this->company->categories()->count(),
            'pending_sales' => $this->company->orders()->whereDate('created_at', now())->where('status', '<>', 'complete')->count(),
            'completed_sales' => $this->company->orders()->whereDate('created_at', now())->where('status', 'complete')->count(),
        ]);
    }
    public function render()
    {
        return view('livewire.invoice.index');
    }
}
