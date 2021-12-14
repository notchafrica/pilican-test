<?php

namespace App\Http\Livewire\Sale;

use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{
    public $company;
    public function mount($company)
    {
        $this->company = $company;
    }

    public function columns(): array
    {
        return [
            Column::make('Reference'),
            Column::make('Customer', 'customer.name'),
            Column::make('Method', 'method'),
            Column::make('Total', 'amount'),
            Column::make('Status', 'status'),
            Column::make('Date', 'created_at'),
            Column::make('', 'created_at')->format(function ($products, $key, $sale) {
                return view('livewire.sale.action.table-dropdown', ['sale' => $sale]);
            }),
        ];
    }

    public function query()
    {
        return $this->company->orders();
    }

    public function openModal($sale)
    {
        $this->emit("openModal", "sale.details", ['order' => $sale]);
    }
}
