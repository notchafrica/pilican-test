<?php

namespace App\Http\Livewire\License;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Confirm extends Component
{
    public $error = "";
    public $key = "";
    public $license;

    public function mount()
    {
        $this->license = auth()->user()->company->license;
    }
    public function render()
    {
        return view('livewire.license.confirm')->extends('layouts.auth');
    }

    public function update()
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

        $r = json_decode($response->body(), true);

        if (!$r['company'] || !$r['company']['code'] == auth()->user()->company->code || $this->license->key != $r['key']) {

            $this->license->update([
                'key' => $r['key'],
                'status' => $r['status'],
                'name' => $r['license_type']['name'],
                'expired_at' => $r['expired_at'],
                'notification' => $r['license_type']['notification'],
                'cloud' => $r['license_type']['cloud'],
                'desk' => $r['license_type']['desk'],
            ]);

            return redirect()->route('home');

            // store registration on remote
        } else {
            $this->error = "error";
        }
    }
}
