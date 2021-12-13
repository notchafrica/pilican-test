<?php

namespace App\Http\Livewire\Staff\Role;

use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Spatie\Permission\Models\Role;

class Table extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Name')
                ->sortable()
                ->searchable(),
            Column::make('Guard', 'guard_name')
        ];
    }

    public function query()
    {
        return Role::query()
            ->select('id', 'name', 'guard_name')
            ->orderBy('name');
    }
}
