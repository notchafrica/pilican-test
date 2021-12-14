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
            Column::make('Date', 'created_at'),
        ];
    }

    public function query()
    {
        return $this->company->orders();
    }
}
