<?php

namespace App\Http\Livewire\Cashout;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $company;
    public $amount;
    public $reason;
    public $status;

    public function mount()
    {
        $this->company = auth()->user()->company;
    }

    public function save()
    {
        $this->validate([
            'amount' => 'required|numeric',
            'reason' => 'required',
        ]);

        $cashout = $this->company->cashouts()->create([
            'amount' => $this->amount,
            'reason' => $this->reason,
            'user_id' => auth()->id(),
        ]);

        $this->emit('cashoutCreated', $cashout);
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.cashout.create');
    }
}
