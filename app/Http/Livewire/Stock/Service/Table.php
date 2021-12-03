<?php

namespace App\Http\Livewire\Stock\Service;

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
            Column::make('Name')
                ->sortable()
                ->searchable(),
            Column::make('Price', 'price'),
            Column::make('SKU', 'sku'),
            Column::make('Added at', 'created_at'),
        ];
    }

    public function query()
    {
        return $this->company->services()
            ->orderBy('name');
    }
}
