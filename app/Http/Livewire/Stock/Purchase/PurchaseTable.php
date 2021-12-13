<?php

namespace App\Http\Livewire\Stock\Purchase;

use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PurchaseTable extends DataTableComponent
{
    public $company;
    public function mount($company)
    {
        $this->company = $company;
    }
    public function columns(): array
    {
        return [
            //Column::make('Reference', 'id'),
            Column::make('Products', 'products_count'),
            Column::make('Date', 'created_at'),
            Column::make('', 'products')->format(function ($products, $key, $purchase) {
                return view('livewire.stock.purchase.button', ['purchase' => $purchase]);
            }),
        ];
    }

    public function openModal($purchase)
    {
        $this->emit("openModal", "stock.purchase.details", ['purchase' => $purchase]);
    }

    public function query()
    {
        return $this->company->purchases()->withCount(['products'])->orderBy('created_at', 'desc');
    }
}
