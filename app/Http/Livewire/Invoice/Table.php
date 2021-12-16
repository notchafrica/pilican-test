<?php

namespace App\Http\Livewire\Invoice;

use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class Table extends DataTableComponent
{
    public $columnSearch = [
        'reference' => null,
    ];
    public $company;
    public function mount($company)
    {
        $this->company = $company;
    }
    public function boot()
    {
        $this->queryString['columnSearch'] = ['except' => null];
    }

    /* public function columns(): array
    {
        return [
            Column::make('Sort')
                ->sortable()
                ->footer(function ($rows) {
                    return 'Sum: ' . $rows->sum('sort');
                }),
            Column::make('Name')
                ->sortable()
                ->searchable()
                ->asHtml()
                ->secondaryHeader(function () {
                    return view('tables.cells.input-search', ['field' => 'name', 'columnSearch' => $this->columnSearch]);
                }),
            Column::make('E-mail', 'email')
                ->sortable()
                ->searchable()
                ->asHtml()
                ->secondaryHeader(function () {
                    return view('tables.cells.input-search', ['field' => 'email', 'columnSearch' => $this->columnSearch]);
                }),
            Column::make('Active')
                ->sortable(),
            Column::make('Verified', 'email_verified_at')
                ->sortable()
                ->excludeFromSelectable(),
        ];
    } */

    public function columns(): array
    {
        return [
            Column::make('Reference')->searchable(),
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
        return $this->company->orders()->when($this->getFilter('status'), fn ($query, $active) => $query->where('status', $active));
    }

    public function filters(): array
    {
        return [
            'status' => Filter::make('Status')
                ->select([
                    ''    => 'Any',
                    'pending' => 'Pending',
                    'complete'  => 'Invoiced',
                ]),
            'verified_from' => Filter::make('From')
                ->date(),
            'verified_to' => Filter::make('To')
                ->date(),
        ];
    }

    public function openModal($sale)
    {
        $this->emit("openModal", "invoice.details", ['order' => $sale]);
    }
}
