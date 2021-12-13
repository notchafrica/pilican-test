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
            Column::make('Reference', 'id'),
            Column::make('Status', 'status'),
            Column::make('Date', 'created_at'),
        ];
    }

    public function query()
    {
        return $this->company->products()
            ->orderBy('name');
    }
}
