<?php

namespace App\Http\Livewire\Stock\Product;

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
            /* Column::make('Price', 'price')->format(function ($products, $key, $product) {
                return $product->price . ' FCFA';
            }), */
            Column::make('Reference', 'code'),
            Column::make('Stock', 'quantity')->format(function ($products, $key, $product) {
                return $product->purchases()->sum('quantity') - $product->sales()->sum('quantity');
            }),
            Column::make('Category', 'category.name'),
            Column::make('Added at', 'created_at'),
        ];
    }

    public function query()
    {
        return $this->company->products();
    }
}
