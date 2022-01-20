<?php

namespace App\Http\Livewire\Reporting;

use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class Table extends  DataTableComponent
{

    public $company;
    public function mount($company)
    {
        $this->company = $company;
    }

    public function columns(): array
    {
        return [
            Column::make('Date', 'created_at'),
            Column::make('Status', 'status'),
            Column::make('', 'created_at')->format(function ($products, $key, $sale) {
                return view('livewire.sale.action.table-dropdown', ['sale' => $sale]);
            }),
        ];
    }

    public function query()
    {
        return $this->company->orders()->when($this->getFilter('status'), fn ($query, $active) => $query->where('status', $active));
    }

    public function filters(): array
    {
        return [
            'verified_from' => Filter::make('From')
                ->date(),
            'verified_to' => Filter::make('To')
                ->date(),
        ];
    }
}
