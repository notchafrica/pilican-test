<?php

namespace App\Http\Livewire\Cashout;

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
            Column::make('Amount', 'amount'),
            Column::make(__('Reason'), 'reason'),
            Column::make(__('User'), 'user.name'),
            Column::make('Status', 'status'),
            Column::make('Date', 'created_at'),
        ];
    }

    public function query()
    {
        return $this->company->cashouts();
    }
}
