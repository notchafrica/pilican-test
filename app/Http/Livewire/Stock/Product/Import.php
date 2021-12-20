<?php

namespace App\Http\Livewire\Stock\Product;

use App\Imports\ProductsImport;
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

        \Excel::import(new ProductsImport, $this->file);

        $this->emit('productImported');
        $this->closeModal();
    }
    public function render()
    {
        return view('livewire.stock.product.import');
    }
}
