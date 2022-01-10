<?php

namespace App\Http\Livewire\License;

use Livewire\Component;

class Confirm extends Component
{
    public function render()
    {
        return view('livewire.license.confirm')->extends('layouts.auth');
    }
}
