<?php

namespace App\Http\Livewire\License;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Validate extends Component
{
    public $error = "";
    public $key = "";
    public function render()
    {
        return view('livewire.license.validate')->extends('layouts.auth');
    }

    public function activate()
    {
        $this->validate([
            'key' => ['required']
        ]);

        $this->error = "";


        //get license

        $response = Http::acceptJson()->get('http://' . env('LICENSE_DOMAIN') . '/' . $this->key);

        if ($response->successful()) {
            $this->error = "error";
        }

        dd($response->body());
    }
}
