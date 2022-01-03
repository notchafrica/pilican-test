<?php

namespace App\Http\Livewire\Stock\Product;

use App\Exports\ProductsExport;
use Livewire\Component;

class Browse extends Component
{
    public $company;
    protected $listeners = ['productAdded' => 'render', 'productImported' => 'render'];


    public function export()
    {
        return \Excel::download(new ProductsExport, 'products-' . now()->format("d-m-y") . '.xlsx');
    }

    public function pdf()
    {
        return \Excel::download(new ProductsExport, 'products-' . now()->format("d-m-y") . '.pdf', \Maatwebsite\Excel\Excel::MPDF);
    }

    public function mount()
    {
        $this->company = auth()->user()->company;
    }


    public function render()
    {
        return view('livewire.stock.product.browse');
    }
}
