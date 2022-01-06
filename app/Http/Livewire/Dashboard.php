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
        $sales = LivewireCharts::lineChartModel();
        $cashouts = LivewireCharts::lineChartModel();

        $movement2->setTitle("Stock output");
        $movement->setTitle(__('Stock Entry'));
        $sales->setTitle(__('Sales'));
        $cashouts->setTitle(__('Cashout'));

        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $movement->addPoint($date->format('d M'), $this->company->purchases()->whereDate('created_at', $date)->count());
            $movement2->addPoint($date->format('d M'), $this->company->orders()->whereDate('created_at', $date)->whereStatus('complete')->count());
            $sales->addPoint($date->format('d M'), $this->company->orders()->whereDate('created_at', $date)->whereStatus('complete')->sum('amount'));
            $cashouts->addPoint($date->format('d M'), $this->company->cashouts()->whereDate('created_at', $date)->whereStatus('complete')->sum('amount'));
        }


        return view('livewire.dashboard', [
            "entryChart" => $movement,
            "outChart" => $movement2,
            "salesChart" => $sales,
            "cashoutsChart" => $cashouts,
        ]);
    }
}
