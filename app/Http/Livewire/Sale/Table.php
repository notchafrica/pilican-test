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
            Column::make('Total', 'price'),
            Column::make('SKU', 'sku'),
            Column::make('Added at', 'created_at'),
        ];
    }

    public function query()
    {
        return $this->company->services()
            ->orderBy('name');
    }
    public function render()
    {
        return view('livewire.sale.table');
    }
}
