<?php

namespace App\Http\Livewire\Stock\Category;

use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CategoryTable extends DataTableComponent
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
            Column::make('Code', 'code')
        ];
    }

    public function query()
    {
        return $this->company->categories()
            ->select('id', 'name', 'code')
            ->orderBy('name');
    }
}
