<?php

namespace App\Http\Livewire\Stock\Product;

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
            Column::make('Reference', 'code'),
            Column::make('Stock', 'quantity')->format(function ($products, $key, $product) {
                return $product->purchases()->sum('quantity') - $product->sales()->sum('quantity');
            }),
            Column::make('Category', 'category.name'),
            Column::make('Added at', 'created_at'),
            Column::make('', 'created_at')->format(function ($products, $key, $product) {
                return view('livewire.stock.product.action.dropdown', ['product' => $product]);
            }),
        ];
    }

    public function query()
    {
        return $this->company->products()->orderBy('name', 'asc');
    }

    public function openModal($product, $type = "unity")
    {
        switch ($type) {
            case 'unity':
                $this->emit("openModal", "stock.product.action.add-unity", ['product' => $product]);
                break;

            default:
                $this->emit("openModal", "stock.product.details", ['product' => $product]);
                break;
        }
    }
}
