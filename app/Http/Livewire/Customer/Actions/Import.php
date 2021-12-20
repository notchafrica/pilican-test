<?php

namespace App\Http\Livewire\Customer\Actions;

use App\Imports\CustomersImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Import extends ModalComponent
{
    use WithFileUploads;
    public $file;
    public function import()
    {
        $this->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

        \Excel::import(new CustomersImport, $this->file);

        $this->emit('customerImported');
        $this->closeModal();
    }
    public function render()
    {
        return view('livewire.customer.actions.import');
    }
}
