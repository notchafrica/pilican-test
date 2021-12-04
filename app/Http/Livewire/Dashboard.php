<?php

namespace App\Http\Livewire;

use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class Dashboard extends Component
{
    public $company;

    public function mount()
    {
        $this->company = auth()->user()->company;
    }
    public function render()
    {
        $movement =
            LivewireCharts::lineChartModel();

        $movement->setTitle("Stock Entry");

        for ($i = 30; $i > 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $movement->addPoint($date, random_int(1, 999));
        }

        $movement2 = $movement;
        $movement2->setTitle("Stock output");
        return view('livewire.dashboard', [
            "entryChart" => $movement,
            "outChart" => $movement2,
        ]);
    }
}
