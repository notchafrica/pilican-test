<?php

namespace App\Http\Livewire\Staff\User;

use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{
    public $company;

    public function mount()
    {
        $this->company = auth()->user()->company;
    }
    public function columns(): array
    {
        return [
            Column::make('Name')
                ->sortable()
                ->searchable(),
            Column::make('Email', 'email'),
            Column::make('Phone', 'phone'),
            Column::make('Username', 'username'),
            Column::make('Roles', 'roles')
                ->sortable()
                ->format(function ($roles) {
                    return collect($roles)->pluck('name')->implode(', ');
                })
        ];
    }

    public function query()
    {
        return $this->company->users()->with('roles')
            ->orderBy('name');
    }
}
