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

    public function openModal($sale)
    {
        $this->emit("openModal", "reporting.details", ['reporting' => $sale]);
    }

    public function query()
    {
        return $this->company->reportings();
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
