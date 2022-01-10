<?php

namespace App\Http\Livewire\License;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Billing extends Component
{
    public $license;

    public function mount()
    {
        $this->license = auth()->user()->company->license;
    }
    public function render()
    {
        return view('livewire.license.billing')->extends('layouts.auth');
    }

    public function checking()
    {

        $r = Http::acceptJson()->get('http://' . env('LICENSE_DOMAIN') . '/' . $this->license->key);

        if ($r->successful()) {
            $d = json_decode($r->body(), true);
            if ($d['status'] == 'payed') {
                $this->license->status = 'payed';
                $this->license->save();

                return redirect()->route('home');
            }
        }
    }
}
