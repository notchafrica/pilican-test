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
        $movement2 = LivewireCharts::lineChartModel();

        $movement2->setTitle("Stock output");
        $movement->setTitle("Stock Entry");

        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $movement->addPoint($date->format('d M'), $this->company->purchases()->whereDate('created_at', $date)->count());
            $movement2->addPoint($date->format('d M'), $this->company->orders()->whereDate('created_at', $date)->whereStatus('completed')->count());
        }



        return view('livewire.dashboard', [
            "entryChart" => $movement,
            "outChart" => $movement2,
        ]);
    }
}
