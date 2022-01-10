<?php

namespace App\Http\Livewire\License;

use App\Models\CompanyLicense;
use App\Models\Customer;
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

        $r = json_decode($response->body(), true);

        if (!$r['company'] || !$r['company']['code'] == auth()->user()->company->code) {
            $license = CompanyLicense::create([
                'key' => $r['key'],
                'status' => $r['status'],
                'name' => $r['license_type']['name'],
                'expired_at' => $r['expired_at'],
                'notification' => $r['license_type']['notification'],
                'cloud' => $r['license_type']['cloud'],
                'desk' => $r['license_type']['desk'],
                'company_id' => auth()->user()->company->id
            ]);

            return redirect()->route('home');

            // store registration on remote
        } else {
            $this->error = "error";
        }
    }
}
